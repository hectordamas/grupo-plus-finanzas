<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;

class Seller extends Model
{
    protected $guarded = [];

    public function clients(){
        return $this->hasMany(Client::class);
    }
    public function bills(){
        return $this->hasMany(Bill::class);
    }
}
