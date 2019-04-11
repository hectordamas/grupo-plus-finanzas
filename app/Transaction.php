<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;
use App\Exchange;

class Transaction extends Model
{
    protected $guarded = [];

    public function exchange(){
      return $this->belongsTo(Exchange::class);
    }
    public function account(){
      return $this->belongsTo(Account::class);
    }
}
