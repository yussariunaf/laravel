<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recapitulation extends Model
{
    protected $table = 'recapitulations';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function majors() {
        return $this->belongsTo(Majors::class, 'major_id');
    }
    public function faculties() {
        return $this->belongsTo(Faculties::class, 'faculty_id');
        // return $this->hasOne(Faculties::class);
    }
    public function training() {
        return $this->belongsTo(Training::class);
    }
}
