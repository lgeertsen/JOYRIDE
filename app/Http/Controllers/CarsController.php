<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarsController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $cars = Car::where('user_id', auth()->id())->get();
    return view('cars.index', compact('cars'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    return view('cars.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    $this->validate($request, [
      'brand' => 'required',
      'model' => 'required',
      'color' => 'required'
    ]);

    $car = Car::create([
      'user_id' => auth()->id(),
      'brand' => request('brand'),
      'model' => request('model'),
      'color' => request('color')
    ]);

    return redirect()->route('profile', ['user' => auth()->user()->id])
            ->with('flash', 'Car added successfully');
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Car  $car
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Car $car)
  {
    $this->authorize('update', $car);

    $car->update([
      'brand' => request('brand'),
      'model' => request('model'),
      'color' => request('color'),
    ]);

    if(request()->wantsJson()) {
      return response([], 204);
    }

    return redirect()->route('profile', ['user' => auth()->user()->id]);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Car  $car
  * @return \Illuminate\Http\Response
  */
  public function destroy(Car $car)
  {
    $this->authorize('update', $car);

    $car->delete();

    if(request()->wantsJson()) {
      return response([], 204);
    }

    return redirect()->route('profile', ['user' => auth()->user()->id]);
  }
}
