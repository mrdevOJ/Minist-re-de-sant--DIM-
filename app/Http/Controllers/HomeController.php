<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $date = $request->input('date');
        $salle = $request->input('salle');
    
        
        $date = Reserve::when($date, function ($query)use ($date,$salle) {
            return $query->where('date', $date)->where('salle',$salle)->orderBy('first', 'asc');
        })->get();
     
      return view('/home',[
        
        'reservations'=>$date  
    ]);
     
    }
}
