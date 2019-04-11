<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bank;
use App\Company;

class Register extends Model
{
  protected $guarded = [];
  
  public function account(){
    return $this->belongsTo(Account::class);
  }

  public function scopeType($query, $type){
    if($type)
      return $query->where('type', 'LIKE', "%$type%");
  }
  public function scopeBeneficiary($query, $beneficiary){
    if($beneficiary)
      return $query->where('beneficiary', 'LIKE', "%$beneficiary%");
  }
  public function scopeStatus($query, $status){
    if($status)
      return $query->where('status', 'LIKE', "%$status%");
  }
  public function scopeDescription($query, $description){
    if($description)
      return $query->where('description', 'LIKE', "%$description%");
  }
  public function scopeContable($query, $contable){
    if($contable)
      return $query->where('contable', 'LIKE', "%$contable%");
  }
  public function scopeReason($query, $reason){
    if($reason)
      return $query->where('reason', 'LIKE', "%$reason%");
  }
  public function scopeResponsable($query, $responsable){
    if($responsable)
      return $query->where('responsable', 'LIKE', "%$responsable%");
  }
}
