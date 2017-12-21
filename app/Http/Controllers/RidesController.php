<?php

namespace App\Http\Controllers;

use App\Car;
use App\User;
use App\Ride;
use App\Filters\RideFilters;
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
  public function index(Request $request, RideFilters $filters) {
    $query = $request->query;
    $rides = $this->getRides($filters);
    //$rides2 = Ride::latest()->get();

    return view('rides.index', ['rides' => $rides]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $user = auth()->user();
    $cars = Car::where('user_id', $user->id)->get();

    if($cars->isEmpty()) {
      return redirect('/cars/new')->with('flash', 'You need to register a car before you can add a ride');
    }
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
      'time' => 'required',
      'price' => 'required',
      'distance' => 'required',
      'duration' => 'required',
    ]);

    $ride = Ride::create([
      'user_id' => auth()->id(),
      'car_id' => request('car_id'),
      'seats' => request('seats'),
      'start' => request('start'),
      'destination' => request('destination'),
      'date' => request('date'),
      'time' => request('time'),
      'price' => request('price'),
      'distance' => request('distance'),
      'duration' => request('duration'),
    ]);

    return redirect()->route('profile', ['user' => auth()->user()->id]);
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Ride  $ride
  * @return \Illuminate\Http\Response
  */
  public function show(User $user, Ride $ride) {
    $passengers = $ride->passengers()->get();

    return view('rides.show', [
      'ride' => $ride,
      'passengers' => $passengers,
      'passengerCount' => $passengers->count(),
    ]);
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
    $this->authorize('update', $ride);

    $ride->delete();

    if(request()->wantsJson()) {
      return response([], 204);
    }

    return redirect()->route('profile', ['user' => auth()->user()->id]);
  }

  protected function getRides(RideFilters $filters) {
    $rides = Ride::latest()->filter($filters)->where('date', '>=', date("Y-m-d"))->get();

    return $rides;
  }
}
