<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bank;
use App\Account;
use App\Register;

class Company extends Model
{
  protected $guarded = [];

  public function accounts(){
    return $this->hasMany(Account::class);
  }
}
