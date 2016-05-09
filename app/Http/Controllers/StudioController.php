<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use App\Reservation;
use App\Http\Requests;

class StudioController extends Controller
{
     /**
     * View list of all of the studios
     */
    public function index(Request $request)
    {
        $studios = Studio::orderBy('created_at', 'asc')->get();   

        return view('studios.index', [
            'studios' => $studios,
        ]);
    }
    
    /**
     * Create a new studio
     */
    public function store(Request $request)
    {
         $validator = $this->validate($request, [
        'name' => 'required|max:255',
         'price' => 'integer'
        ]);
    
        $studio = new Studio;
        $studio->name = $request->name;
        $studio->price = $request->price;
        $studio->save();
        
        $studios = Studio::orderBy('created_at', 'asc')->get();   

        return view('studios.index', [
            'studios' => $studios,
        ]);
    }
    
    /**
     * Edit an existing studio name or price
     */
    public function edit(Request $request, Studio $studio) {
        $validator = $this->validate($request, [
        'name' => 'required|max:255',
         'price' => 'integer',
        ]);
        $studio->name = $request->name;
        $studio->price = $request->price;
        $studio->save();
        return redirect('/');
    }
    /**
     * Find reservations coming up for a studio
     */
     public function details(Request $request, Studio $studio) {
        $ldate = date('Y-m-d H:i:s');
       $reservations = $studio->reservations()->where('date', '>', $ldate)->orderBy('date', 'asc')->get();
         return view('studios.details', [
            'studio' => $studio,
            'reservations' => $reservations
        ]);
     }
     
    /**
     * Create a reservation for a studio
     */
     public function reserve(Request $request, Studio $studio) {
    
        $reservation = new Reservation;
        $reservation->studio_id = $studio->id;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->save();
        
        return $this->details($request, $studio);
     }
     
    
    
    /**
     * Delete a studio
     */
    public function destroy(Request $request, Studio $studio) {
         $studio->delete();
        return redirect('/');
    }
}


