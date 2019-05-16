<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Company;


class Bill extends Model
{
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
