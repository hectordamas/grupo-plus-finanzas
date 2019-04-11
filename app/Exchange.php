<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bank;
use App\Company;
use App\Account;
use App\Transaction;

class Exchange extends Model
{
//////////////////////////////////////////////////////////////////////////////////

  protected $guarded = [];
//////////////////////////////////////////////////////////////////////////////////
  public function transactions(){
    return $this->hasMany(Transaction::class);
  }

}
