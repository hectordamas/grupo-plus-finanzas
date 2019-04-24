<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\User;
use App\Beneficiary;

class Demand extends Model
{
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function beneficiary(){
        return $this->belongsTo(Beneficiary::class);
    }
    
}
