<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\Register;
use App\Account;

class Bank extends Model
{
    protected $guarded = [];

    public function accounts(){
      return $this->hasMany(Account::class);
    }
}
