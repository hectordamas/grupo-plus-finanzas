<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Company;
use App\Seller;


class Bill extends Model
{
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function seller(){
        return $this->belongsTo(Seller::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
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
