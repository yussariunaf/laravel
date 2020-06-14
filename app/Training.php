<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $casts = [ 'majors' => 'array' ];

    public function student_tickets() {
        return $this->hasMany(Studentticket::class, 'training_id', 'id');
    }

    public function recap() {
        return $this->hasMany(Recapitulation::class);
    }

    public function certificate() {
        return $this->hasMany(Certificate::class);
    }
}
