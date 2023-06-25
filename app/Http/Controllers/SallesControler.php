<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SallesControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Salles.index',[
            'salles'=>Salle::all()
        ]);
       
    }

    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
