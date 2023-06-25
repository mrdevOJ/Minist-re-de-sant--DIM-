<?php

namespace App\Http\Controllers;

use App\Models\Lesreservation;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeletReservation extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $date = $request->input('date');
        $salle = $request->input('salle');
    
        
    //     $date = Reserve::when($date, function ($query)use ($date,$salle) {
    //         return $query->where('date', $date)->where('salle',$salle);
    //     })->get();
     if(Auth::user()->username=="adminadmin"){

        $data = Reserve::where(function ($query)use ($date,$salle) {
            return $query->where('date', $date)->where('salle',$salle)->orderBy('first', 'asc');})->get();

     }
     else
     {

     
  $user =Auth::user()->username;
        $data = Reserve::where('username', 'LIKE',"$user" )->where(function ($query)use ($date,$salle) {
                    return $query->where('date', $date)->where('salle',$salle)->orderBy('first', 'asc');})->get();
}

      return view('/historique.index',[
        
        'reservations'=>$data,
        
    ]);



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $reservation)
    {
        $delet = Reserve::findOrFail($reservation);
        $delet->delete();
        return redirect()->route('historique.index');

    }
}
