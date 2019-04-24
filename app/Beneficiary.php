<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Demand;

class Beneficiary extends Model
{
    protected $guarded = [];

    public function demands(){
        return $this->hasMany(Demand::class);
    }
}
