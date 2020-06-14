<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Training;
use App\Studentblocked;
use App\Studentticket;
use App\Recapitulation;
use App\Certificate;
use App\Majors;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;
use Route;


class PelatihanController extends Controller
{
    protected $studentID;

    public function getStdID() {
        return Auth::guard('user')->user()->students->id;
    }

    public function index() {
        $major_id = auth()->guard('user')->user()->students->major_id;
        $training = Training::all();
        $arrTraining = [];
        foreach ($training as $value) {
            if(in_array($major_id, $value['majors'])) {
                $arrTraining[] = $value['id'];
            }
        }
        $selectTraining = Training::whereIn('id', $arrTraining)->whereDate('begin', '>=', date('Y-m-d'))->orderByDesc('created_at')->get();
        return view('user.pelatihan.index', [
            'trainings' => $selectTraining
        ]);
    }

    public function detail($pelatihan_id) {
        $training = Training::find($pelatihan_id);
        return view('user.pelatihan.detail', [
            'training' => $training
        ]);
    }

    public function register($pelatihan_id) {
        $faker = Faker::create('id_ID');
        $linkToStudent = auth()->guard('user')->user()->students;
        $studentID = $linkToStudent->id;
        $facultyID = $linkToStudent->faculty_id;
        $majorID   = $linkToStudent->major_id;

        $checkBlockedStudent = Studentblocked::where('student_id', $studentID)->first();
        // jika blm kedaftar atau blocked untilnya null
        if($checkBlockedStudent == null || $checkBlockedStudent->blocked_until == null) {
            Studentticket::create([
                'student_id' => $studentID,
                'faculty_id' => $facultyID,
                'major_id'   => $majorID,
                'training_id'=> $pelatihan_id,
                'ticket_code'=> $faker->numberBetween(100000000, 999999999),
                // 'present'    => date_create()->format('Y-m-d H:i:s'),
            ]);
            Training::find($pelatihan_id)->decrement('kuota');
            return redirect()->route('pelatihan.detail', $pelatihan_id)->withSuccess('Berhasil registrasi pelatihan, silahkan lihat tiket pada halaman profile anda');
        } else {
            return redirect()->back()->withError('Akun anda saat ini ditangguhkan sementara');
        }
    }

    public function cancelled($pelatihan_id) {
        $studentID = PelatihanController::getStdID();
        Studentticket::where('student_id', $studentID)->where('training_id', $pelatihan_id)->delete();
        Training::where('id', $pelatihan_id)->increment('kuota');
        return redirect()->route('pelatihan.detail', $pelatihan_id)
                         ->withSuccess('Pelatihan dibatalkan');
    }

    public function ticket($pelatihan_id, $student_id) {
        $stdtix = PelatihanController::getStudentTicket($pelatihan_id, $student_id);
        return view('user.profile.ticket', [ 'trn' => $stdtix ]);
    }

    public function generateTicket($pelatihan_id, $student_id) {
        $trn = PelatihanController::getStudentTicket($pelatihan_id, $student_id);
        $pdf = PDF::loadView('user.profile.generate_ticket', ['trn' => $trn] );
        return $pdf->stream('ticket.pdf');
    }

    public function getStudentTicket($pelatihan_id, $student_id) {
        $selectedTraining = DB::table('trainings as trn')
                            ->join('student_tickets as stck', 'stck.training_id', '=', 'trn.id')
                            ->join('students as std', 'std.id', '=', 'stck.student_id')
                            ->join('users as usr', 'usr.id', '=', 'std.user_id')
                            ->join('faculties as fak', 'fak.id', '=', 'std.faculty_id')
                            ->join('majors as jur', 'jur.id', '=', 'std.major_id')
                            ->where('stck.student_id', $student_id)
                            ->where('trn.id', $pelatihan_id)
                            ->select(
                                    'trn.name as training_name',
                                    'trn.id as training_id',
                                    'std.id as student_id',
                                    'usr.nim as user_nim',
                                    'usr.name as user_name',
                                    'fak.name as faculty_name',
                                    'jur.name as major_name',
                                    'trn.begin as event_begin',
                                    'stck.id as ticket_id',
                                    'stck.created_at as order_ticket_date',
                                    'stck.ticket_code as ticket_code',
                                    'trn.header as img_path')->first();
            return $selectedTraining;
    }

    public function certificateFrm() {
        return view('user.profile.certificate');
    }

    public function certificatePrint($trnid, $stdid) {
        $cert = DB::table('trainings as trn')
                ->join('student_tickets as stck', 'stck.training_id', '=', 'trn.id')
                ->join('students as std', 'std.id', '=', 'stck.student_id')
                ->join('users as usr', 'usr.id', '=', 'std.user_id')
                ->where('stck.student_id', $stdid)
                ->where('trn.id', $trnid)
                ->select('trn.name as training_name', 'trn.begin as training_date', 'usr.name as user_name')
                ->first();
                // dd($cert);
        $pdf = PDF::loadView('user.profile.generate_certificate', ['cert' => $cert] );
        return $pdf->stream('certificate.pdf');
    }

    // Admin UPT
    public function create() {
        return view('upt.pelatihan.create');
    }

    // Pelatihan per satuan hari, today, past, next
    public function today() {
        session()->put('previous-route', Route::current()->getName());
        return view('upt.pelatihan.today');
    }
    public function past() {
        session()->put('previous-route', Route::current()->getName());
        return view('upt.pelatihan.past');
    }
    public function upcoming() {
        return view('upt.pelatihan.upcoming');
    }
    public function preview($pelatihan_id) {
        $attended = DB::table('student_tickets as stdtix')
                        ->join('majors as jur', 'jur.id', '=', 'stdtix.major_id')
                        ->join('students as std', 'std.id', '=', 'stdtix.student_id')
                        ->join('users as usr', 'usr.id', '=', 'std.user_id')
                        ->where('stdtix.training_id', '=', $pelatihan_id)
                        ->where('stdtix.present', '=', 1 )
                        ->select(
                            'jur.name as jurusan', 
                            'usr.name as student', 
                            'stdtix.present as present', 
                            'stdtix.updated_at as updated_at')
                        ->orderByDesc('updated_at')
                        ->get();
                    // dd($attended);
        $trn = Training::find($pelatihan_id);
        return view('upt.confirm.detail', [
            'trn' => $trn,
            'att' => $attended
        ]);
    }
    public function confirmFrm($pelatihan_id) {
        $trn = Training::find($pelatihan_id);
        return view('upt.confirm.index', [
            'trn' => $trn
        ]);
    }
    public function confirmProcess(Request $req) {
        $trnid       = $req->training_id;
        $ticket_code = $req->ticket_code;
        $checkTix = Studentticket::where('training_id', $trnid)->where('ticket_code', $ticket_code)->first();
        if($checkTix) {
            Recapitulation::where('training_id', $trnid)->where('major_id', $checkTix->major_id)->increment('presents_count');
            $checkTix->increment('present');
            return back()->withSucc($checkTix->students->users->name . " Berhasil registrasi pukul " . date('H:i') . " (WIB)");
        }
        return back()->withErr('Kode tidak ditemukan');
    
    }
    public function close_rsvp($pelatihan_id) {
        $training = Training::find($pelatihan_id);
        $training->increment('status'); // set to 2
        $majors   = $training->majors;

        // Set absents_count for all person that not attended
        foreach ($majors as $value) {
            $getTotalAbsentsPerMajor  = Studentticket::where('training_id', $pelatihan_id)
                                                    ->where('major_id', $value)->where('present', '=', 0)
                                                    ->count();
            Recapitulation::where('training_id', $pelatihan_id)
                            ->where('major_id', $value)
                            ->update([ 'absents_count' => $getTotalAbsentsPerMajor ]);
            // Training::where('id', $pelatihan_id)->update(['status' => 2]);
        }

        $stdtix = Studentticket::where('training_id', $pelatihan_id)->where('present', '=', 0)->get();
        // $blockedNextDate = Carbon::now()->addMonths(1)->format('Y-m-d');
        $blockedNextDate = Carbon::now()->addWeeks(2)->format('Y-m-d');
        foreach ($stdtix as $key => $value) {
            $stdID =  $value['student_id'];
                $checkBlockedAcc = Studentblocked::where('student_id', $stdID)->first();
                    if($checkBlockedAcc == null) {
                        $feed = [ 'student_id' => $stdID, 'fail_count' => 1, ];
                        Studentblocked::create($feed);
                    } else {
                        $checkBlockedAcc->increment('fail_count');
                            if($checkBlockedAcc->fail_count % 3 == 0) {
                               $checkBlockedAcc->update([ 'blocked_until' => $blockedNextDate ]);
                            } else {
                               $checkBlockedAcc->update([ 'blocked_until' => null ]);
                            }
                    }
        }
            
        return back()->withSucc('Form pendaftaran ditutup');
    }

    // Crud pelatihan
    public function store(Request $request) {
        if($request->allmajor != null) {
            $getAllMajor = Majors::all();
            $arrMajors = [];
            foreach ($getAllMajor as $val) {
                $arrMajors [] = $val->id;
            }
            $majors = $arrMajors;
        } else {
            $majors = $request->majors;
        }
        $header = $request->file('header');
        // Get file extension
        $ext = $header->extension();
        // set img name
        $imgname = date('dmyHis').'.'.$ext;
        // Validate request file
        $validator = Validator::make($request->all(), [ 'header' => 'required|file|max:5000|mimes:jpeg,jpg,png' ]);
        // If fail on validate
        if ($validator->fails()) {
            toast('Upload gagal','error');
            return redirect()->back();
        }
        // Simpan file gambar ke public/storage/loker
        Storage::putFileAs('public/pelatihan', $header, $imgname);

        $code     = $request->code;
        $name     = $request->name;
        $location = $request->location;
        $kuota    = $request->kuota;
        $trainer  = $request->trainer;
        $body     = $request->body;
        $majors   = $majors;

        $beginTimeConvert = strtotime(str_replace('/','-', $request->begin));
        $begin = date("Y-m-d H:i:s", $beginTimeConvert);
        $ended = date('Y-m-d H:i:s', strtotime('+1 day', strtotime(str_replace('/','-', $request->begin))));

        (date('Y-m-d', $beginTimeConvert) == date('Y-m-d')) ? $status = 1 : $status = 0 ;

        $storeTraining = Training::create([
            'code' => $code,
            'name' => $name,
            'location' => $location,
            'begin' => $begin,
            'ended' => $ended,
            'registration_end' => $ended,
            'trainer' => $trainer,
            'status' => 1,
            'kuota'  => $kuota,
            'header' => $imgname,
            'body' => $body,
            'majors' => $majors
        ]);

        if($storeTraining) {
            $setLatestTraining = Training::latest()->first();
            $getLastTrainingID    = $setLatestTraining->id;
                foreach ($majors as $value) {
                    $findFac = Majors::find($value);
                    $getFac = $findFac->faculty->id;
                    // Store to recapitulations
                    Recapitulation::create([
                        'training_id' => $getLastTrainingID,
                        'faculty_id'  => $getFac,
                        'major_id'    => $value,
                    ]);
                }
        }

        toast('Berhasil tambah pelatihan','success');
        return back();
    }
    public function display($pelatihan_id) {
        $training = Training::find($pelatihan_id);
        return view('upt.pelatihan.display', [
            'training' => $training
        ]);
    }
    public function edit($pelatihan_id) {
        $training = Training::find($pelatihan_id);
        return view('upt.pelatihan.edit', [
            'training' => $training
        ]);
    }
    public function update(Request $request, $pelatihan_id) {
        // dd($request->majors);
        $training = Training::find($pelatihan_id);
        if($request->hasFile('header')) {
            $validator = Validator::make($request->all(), [ 'header' => 'required|file|max:5000|mimes:jpeg,jpg,png' ]);
            // If fail on validate
            if ($validator->fails()) {
                toast('Upload gagal','error');
                return redirect()->back();
            }
            $oldHeader = $training->header;
            Storage::disk('public')->delete('pelatihan/'.$oldHeader);
            $header = $request->file('header');
            $ext = $header->extension();
            $imgname = date('dmyHis').'.'.$ext;
            Storage::putFileAs('public/pelatihan', $header, $imgname);
        } else {
            $imgname = $training->header;
        }

        $beginTimeConvert = strtotime(str_replace('/','-', $request->begin));
        $begin = date("Y-m-d H:i:s", $beginTimeConvert);
        $ended = date('Y-m-d H:i:s', strtotime('+1 day', $beginTimeConvert));
        (date('Y-m-d', $beginTimeConvert) == date('Y-m-d')) ? $status = 1 : $status = 0 ;

        $code     = $request->code;
        $name     = $request->name;
        $location = $request->location;
        $kuota    = $request->kuota;
        $trainer  = $request->trainer;
        $body     = $request->body;
        $majors   = $request->majors;
        $status   = 0;

        Training::where('id', $pelatihan_id)->update([
            'code' => $code,
            'name' => $name,
            'location' => $location,
            'begin' => $begin,
            'ended' => $ended,
            'registration_end' => $ended,
            'trainer' => $trainer,
            'status' => 1,
            'kuota'  => $kuota,
            'header' => $imgname,
            'body' => $body,
            'majors' => json_encode($majors)
        ]);
        toast('Berhasil ubah pelatihan','success');
        return back();
    }
    public function destroy($pelatihan_id){
        $training = Training::find($pelatihan_id);
        $old_header = $training->header;
        Storage::disk('public')->delete("pelatihan/" . $old_header);
        $training->delete();
        toast('Berhasil hapus pelatihan','success');
        return back();
    }

    // Reporting
    public function report() {
        session()->put('previous-route', Route::current()->getName());
        return view('upt.pelatihan.report');
    }

    public function rekapitulasiFrm($pelatihan_id) {
        $pdf = PDF::loadView('upt.pelatihan.rekapitulasi', [
            'trnid' => $pelatihan_id
        ]);
        return $pdf->stream('rekapitulasi.pdf');
        // return view('upt.pelatihan.rekapitulasi', [ 'trnid' => $pelatihan_id]);
    }

    // Certificate
    public function sendCertificate($trnid) {
        $trn = Training::find($trnid);
        $stdtix = $trn->student_tickets; 
        foreach ($stdtix as $value) {
            $stdID = $value->student_id;
                $student_ticket = Studentticket::where('training_id', $trnid)->where('student_id', $stdID)->first();
                    $checkPresent = $student_ticket->present;
                        if($checkPresent != 0) {
                            Certificate::create([
                                'training_id' => $trnid,
                                'student_id'  => $stdID
                            ]);
                        }
        }
        // jadi 3
        $trn->increment('status'); 
        toast('Berhasil membagikan sertifikat','success');
        return back();
    }
}
