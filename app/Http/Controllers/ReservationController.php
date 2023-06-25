<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{


  public function create(){    
        return view('reservation.create',[
            'salles'=>Salle::all()
        ]);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $last = $request->input('last');

        $request ->validate([
                    'username' => ['required'],
                    'salle' => ['required', Rule::unique('reserves')->where(function ($query) use ($request,$last) {
                        return $query->where('date', $request->date) ->whereBetween('first', [$request->first,$last])->whereBetween('last', [$request->first,$last])    ;
                                    //  ->where('first', '<',$request->first)->where('last', '>', $request->last);
                                        
            })],
                   'first' => ['required','after:07:59','before:18:01'] ,
                   'last'=>['required','after:07:59','before:18:01'],
                   'date' => ['required','date','after:yesterday'],
                    
        ],
    [
        'salle.required'=>'Il faut choisir la salle',
        'first.befor'=>'La réservation doit être avant 18:01',
        'first.after'=>'La réservation doit être après 7:59',
        'last.after'=>'La réservation doit être après 7:59',
        'last.befor'=>'La réservation doit être avant 18:01',
    ]);
 
       $reservation = new Reserve();
       $reservation -> name = strip_tags($request->input('name')) ;
       $reservation -> prenom = strip_tags($request->input('prenom')) ;
       $reservation -> username = strip_tags($request->input('username')) ;
       $reservation -> division = strip_tags($request->input('division')) ;
       $reservation -> service = strip_tags($request->input('service')) ;
       $reservation -> salle = strip_tags($request->input('salle')) ;
       $reservation -> date = strip_tags($request->input('date')) ; 
       $reservation -> unite = strip_tags($request->input('unite')) ;
       $reservation -> first = strip_tags($request->input('first')) ;
       $reservation -> validation = strip_tags('en cours de traitement') ;       
        $reservation -> last = strip_tags($last) ;

     

       $reservation->save();
       return redirect()->route('home');

       


    }

    public function edit($id)
    {
        return view('reservation.edit',['reservation'=>Reserve::findorFail($id),  'salles'=>Salle::all()
    ]);
    }

    public function update(Request $request, $id)
    {
        if(Auth::user()->username=="adminadmin"){

        // $last = $request->input('last');

        $request ->validate([
           'validation' => ['required'] ,
            
]);
       $updat = Reserve::findorFail( $id);
    //    $updat -> name = strip_tags($request->input('name')) ;
    //    $updat -> prenom = strip_tags($request->input('prenom')) ;
    //    $updat -> username = strip_tags($request->input('username')) ;
    //    $updat -> division = strip_tags($request->input('division')) ;
    //    $updat -> service = strip_tags($request->input('service')) ;
    //    $updat -> salle = strip_tags($request->input('salle')) ;
    //    $updat -> date = strip_tags($request->input('date')) ; 
    //    $updat -> unite = strip_tags($request->input('unite')) ;
    //    $updat -> first = strip_tags($request->input('first')) ;
       $updat -> validation = strip_tags($request->input('validation')) ;

        // $updat -> last = strip_tags($last) ;
       
        $updat->save();
        return redirect()->route('home');
     }}



}
