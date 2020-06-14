<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function training() {
        return $this->belongsTo(Training::class);
    }
}
