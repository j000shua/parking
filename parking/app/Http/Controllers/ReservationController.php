<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $res = User::find($user->id)->reservations()
                    ->where('ended_at', null)
                    ->first();

        if ($user->rang > 0)
            return view('app.list');
        
        if (1)
            return view('app.index',);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        $user = $request->user();

        //$placesLibres = Place::all()->reservations()->where('ended_at', null);
        $placesLibres = Place::doesntHave('reservations')->get();

        return print($placesLibres);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        echo('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //rang=-1
        $user = User::find($reservation->user_id);
        $user->update([ 'rang' => -1 ]);

        $place = Place::find($reservation->place_id);
        $place->update([ 'is_free' => 1 ]);

        return redirect()->route('app.index');
    }

}