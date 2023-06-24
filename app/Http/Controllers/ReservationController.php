<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index', compact('reservations'));
   
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $reservation = new Reservation();
        $reservation->nomclient = $request->input('nomclient');
        $reservation->dateReservation = $request->input('dateReservation');
        $reservation->heure = $request->input('heure');
        $reservation->nombrePersonne = $request->input('nombrePersonne');
        // Autres attributs...

        $reservation->save();

        return response()->json(['message' => 'Reservation faite avec succes']);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $reservation = Reservation::find();

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        return response()->json($reservation);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation = Reservation::find();

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        $reservation->nomclient = $request->input('nomclient');
        $reservation->dateReservation = $request->input('dateReservation');
        $reservation->heure = $request->input('heure');
        $reservation->nombrePersonne = $request->input('nombrePersonne');
        // Autres attributs...

        $reservation->save();

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
