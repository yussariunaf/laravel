<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentticket extends Model
{
    protected $table = 'student_tickets';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function trainings() {
        return $this->belongsTo(Training::class, 'training_id');
    }

    public function students() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
