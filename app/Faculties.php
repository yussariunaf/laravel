<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'faculties';
  
    public function majors() {
      return $this->hasMany(Majors::class, 'faculty_id', 'id');
    }

    // public function recap() {
    //   return $this->hasOne(Recapitulation::class, 'faculty_id', 'id');
    // }
}
