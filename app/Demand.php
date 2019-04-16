<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Demand extends Model
{
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    
}
