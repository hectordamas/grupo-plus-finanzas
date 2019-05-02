<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demand;

class UploadController extends Controller
{
    public function pdf(Request $request, $id){
        $demand = Demand::find($id);
        $fileName = '';
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/pdf/', $name);
            $fileName = "/pdf/".$name;
          }
        $demand->pdf = $fileName;
        $demand->save();

        return redirect()->back();
    }
}
