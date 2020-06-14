<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Loker;
use Illuminate\Support\Facades\Validator;
use DB;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $jobs = Loker::paginate(10);
        return view('user.loker.index', [
            'jobs' => $jobs,
        ]);
    }

    public function detail($lokerid) {
        $job = Loker::find($lokerid);
        return view('user.loker.detail', [ "job" => $job]);
    }

    public function search(Request $request) {
        $query = $request->search;
        $jobs  =  DB::table('lokers')
                    ->where('title', 'like', "%".$query."%")
                    ->paginate(10);
        session()->flashInput($request->input());
        return view('user.loker.index', [
            'jobs' => $jobs,
        ]); 
    }


    // For UPT

    public function list() {
        return view('upt.loker.list');
    }

    public function create() {
        return view('upt.loker.create');
    }

    public function store(Request $request) {
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
        Storage::putFileAs('public/loker', $header, $imgname);
        // Create data loker
        Loker::create([
            'title'  => $request->title,
            'header' => $imgname,
            'body'   => $request->body
        ]);
        toast('Berhasil tambah lowongan','success');
        return back();
    }

    public function display($lokerid) {
        $job = Loker::find($lokerid);
        $path = Storage::url('loker/'.$job->header);
        return view('upt.loker.display', [
            'job' => $job,
            'path' => $path
        ]);
    }

    public function edit($lokerid) {
        $job = Loker::find($lokerid);
        return view('upt.loker.edit', ['job' => $job]);
    }

    public function update(Request $request, $lokerid) {
        // $job = Loker::find($lokerid);
        // $old_header = $job->header;
        if($request->hasFile('header')) {
            // Validate request file
            $validator = Validator::make($request->all(), [ 'header' => 'required|file|max:5000|mimes:jpeg,jpg,png' ]);
            // If fail on validate
            if ($validator->fails()) {
                toast('Upload gagal','error');
                return redirect()->back();
            }
            // old path image
            $job = Loker::find($lokerid);
            $old_header = $job->header;
            // Delete old image
            Storage::disk('public')->delete("loker/" . $old_header);
            // get file
            $header = $request->file('header');
            // Get file extension
            $ext = $header->extension();
            // set img name
            $imgname = date('dmyHis').'.'.$ext;
            // Simpan file gambar ke public/storage/loker
            Storage::putFileAs('public/loker', $header, $imgname);
            // Update data
            Loker::where('id', $lokerid)->update([
                'title'  => $request->title,
                'header' => $imgname,
                'body'   => $request->body
            ]);
            toast('Berhasil update lowongan','success');
            return redirect()->route('upt.loker.edit', $lokerid);
        }
        Loker::where('id', $lokerid)->update([
            'title' => $request->title,
            'body'  => $request->body
        ]);
        toast('Berhasil update lowongan','success');
        return redirect()->route('upt.loker.edit', $lokerid);
    }

    public function destroy($lokerid) {
        $job = Loker::find($lokerid);
        $old_header = $job->header;
        Storage::disk('public')->delete("loker/" . $old_header);
        $job->delete();
        toast('Berhasil hapus lowongan','success');
        return back();
    }
}
