<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bill;
use App\Ebill;
use App\Seller;

class Client extends Model
{
    protected $guarded = [];

    public function bills(){
        return $this->hasMany(Bill::class);
    }
    public function ebills(){
        return $this->hasMany(Ebill::class);
    }
    
    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}
