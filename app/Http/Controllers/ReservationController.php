<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

class ReservationController extends Controller
{
    
    public function index()
    {
        $reservations = Reservation::paginate();
        return view('reservation.index', compact('reservations'));
   
    }

    
    public function create()
    {
        return view('reservation.create');
    }

    
    public function store(StoreReservationRequest $request)
    {
        Reservation::create(array_merge($request->validated()));
        return redirect()->route('reservationd.index')->with('success', 'Réservation créé avec succès');
    
    
    }

    
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->update($request->validated());
        return redirect()->route('reservations.index')->with('success', 'Réservation mis à jour avec succès');
    }


    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservation.index')->with('success', 'Reservation supprimée avec succès');

    }
}
