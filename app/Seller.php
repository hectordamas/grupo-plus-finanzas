<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bill;
use App\Ebill;

class Seller extends Model
{
    protected $guarded = [];

    public function bills(){
        return $this->hasMany(Bill::class);
    }
    
    public function ebills(){
        return $this->hasMany(Ebill::class);
    }
}
