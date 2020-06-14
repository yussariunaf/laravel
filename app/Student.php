<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'id';

    public function users() {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function student_tickets() {
      // student::Class, FK student di student tiket, pk student
      return $this->hasOne(Studentticket::class, 'student_id', 'id');
    }
    
    public function major() {
      return $this->belongsTo(Majors::class);
    }
}
