<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bill;

class Client extends Model
{
    protected $guarded = [];

    public function bills(){
        return $this->hasMany(Bill::class);
    }
}
