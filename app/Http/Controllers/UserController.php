<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use App\Studentticket;
use DB;

class UserController extends Controller
{

    public function getStdID() {
        return auth()->guard('user')->user()->students->id;
    }

    public function getTraining($time) {
        $stdID = UserController::getStdID();
        $trainings = Training::whereHas('student_tickets', function($query) use ($stdID) {
            $query->where('student_id', $stdID);
        })
        ->with('student_tickets')
        ->whereDate('begin', $time, date('Y-m-d'))
        ->orderByDesc('begin')
        ->paginate(5);
        return $trainings;
    }

    public function upcoming() {
        $trainings = UserController::getTraining(">=");
        return view('user.profile.upcoming',[
            'trainings' => $trainings
        ]);
    }

    // public function past() {
    //     $trainings = UserController::getTraining("<");
    //     return view('user.profile.past',[
    //         'trainings' => $trainings
    //     ]);
    // }
}
