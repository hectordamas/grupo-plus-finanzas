<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;
use App\Client;


class Ebill extends Model
{
    protected $guarded = [];

    public function account(){
        return $this->belongsTo(Account::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function scopeDate($query, $date){
        if($date)
            return $query->where('date','LIKE', $date);
    }
    public function scopeRange($query, $from, $to){
        if($from && $to)
            return $query->where('date','LIKE', [$from, $to]);
    }
    public function scopeClient($query, $client){
        if($client)
            return $query->where('client_id', $client);
    }
    public function scopeSeller($query, $seller){
        if($seller)
            return $query->where('seller_id', $seller);
    }
}
