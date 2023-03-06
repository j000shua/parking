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
        $placesLibres = Place::where('is_free',1)->get();
        
        if(count($placesLibres)===0){
            //user->rang = count(users->where(rang>0))+1
            $user->update([
                'rang'=> count(User::where('rang','>',0)->get())+1,
            ]);
        }
        else{
            $place = $placesLibres->random();

            $place->update(['is_free' => 0]);

            $res = Reservation::create([
                'user_id' => Auth::user()->id,
                'place_id' => $place->id,
            ]);

            $user->update(['rang'=>0]);
        }

        return redirect()->route('app.index', compact('res'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
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
