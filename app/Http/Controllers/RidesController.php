<?php

namespace App\Http\Controllers;

use App\Car;
use App\User;
use App\Ride;
use Illuminate\Http\Request;

class RidesController extends Controller {
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $rides = Ride::latest()->get();

        return view('rides.index', compact('rides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', auth()->id())->first();
        $cars = Car::where('user_id', $user->id)->get();
        return view('rides.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'car_id' => 'required',
          'seats' => 'required',
          'start' => 'required',
          'destination' => 'required',
          'date' => 'required',
          'time' => 'required'
        ]);

        $ride = Ride::create([
          'user_id' => auth()->id(),
          'car_id' => request('car_id'),
          'seats' => request('seats'),
          'start' => request('start'),
          'destination' => request('destination'),
          'date' => request('date'),
          'time' => request('time')
        ]);

        return redirect()->route('rides');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function show(Ride $ride)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function edit(Ride $ride)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ride $ride)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ride $ride)
    {
        //
    }
}
