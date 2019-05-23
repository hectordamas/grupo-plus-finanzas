<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bank;
use App\Account;
use App\Register;
use App\Demand;
use App\Bill;


class Company extends Model
{
  protected $guarded = [];

  public function accounts(){
    return $this->hasMany(Account::class);
  }

  public function demands(){
    return $this->hasMany(Demand::class);
  }
  public function bills(){
    return $this->hasMany(Bill::class);
  }
}
