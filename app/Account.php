<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Register;
use App\Company;
use App\Exchange;
use App\Transaction;
use App\Bank;
use App\Ebill;

class Account extends Model
{
  protected $guarded = [];

  public function registers(){
    return $this->hasMany(Register::class);
  }
  public function transactions(){
    return $this->hasMany(Transaction::class);
  }
  public function bank(){
    return $this->belongsTo(Bank::class);
  }
  public function company(){
    return $this->belongsTo(Company::class);
  }

  public function ebills(){
    return $this->hasMany(Ebill::class);
  }
}
