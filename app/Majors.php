<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'majors';
  
    public function faculty() {
      return $this->belongsTo('App\Faculties');
    }

    public function recap() {
      return $this->hasOne(Recapitulation::class, 'major_id', 'id');
    }

    public function student() {
      return $this->hasOne(Student::class, 'major_id', 'id');
    }

}
