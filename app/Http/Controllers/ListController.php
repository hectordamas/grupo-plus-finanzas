<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;

class ListController extends Controller
{
  public function list(){
    $registers = Register::orderBy('type', 'desc')->get();
    return view('national.Register.list', [
      'registers' => $registers
    ]);
  }
}
