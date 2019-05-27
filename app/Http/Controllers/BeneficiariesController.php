<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beneficiary;
use App\Http\Requests\BeneficiariesRequest;

class BeneficiariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiaries = Beneficiary::all();

        return view('modify.beneficiaries.index', [
            'beneficiaries' => $beneficiaries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeneficiariesRequest $request)
    {
        $beneficiary = Beneficiary::create([
            'identification' => $request->identification,
            'name' => $request->name,
            'number'=> $request->number,
            'nation' => $request->nation
        ]);

        return response()->json([
            'beneficiary' => $beneficiary,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beneficiary = Beneficiary::find($id);

        return response()->json([
            'beneficiary' => $beneficiary
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beneficiary = Beneficiary::find($id);

        return view('modify.beneficiaries.edit', [
            'beneficiary' => $beneficiary
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $beneficiary = Beneficiary::find($id);
        $beneficiary->name = $request->input('name');
        $beneficiary->identification = $request->input('identification');
        $beneficiary->nation = $request->input('nation');
        $beneficiary->number = $request->input('number');
        $beneficiary->save();

        return redirect('/beneficiaries')->with('message', 'Beneficiario modificado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Beneficiary::destroy($id);
        return redirect('/beneficiaries')->with('message', 'Beneficiario eliminado con éxito');
    }
}
