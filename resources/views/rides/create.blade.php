@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Add a ride</div>

        <div class="panel-body">
          <form action="/rides" method="post">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="car_id">Car:</label>
              <select class="form-control" id="car_id" name="car_id" required>
                <option value="">Choose One...</option>
                @foreach ($cars as $car)
                  <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                    {{ $car->description() }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="seats">Number of seats:</label>
              <select class="form-control" id="seats" name="seats" required>
                <option value="">Choose One...</option>
                @for ($i = 1; $i < 11; $i++)
                  <option value="{{ $i }}" {{ old('seats') == $i ? 'selected' : '' }}>
                    {{ $i }}
                  </option>
                @endfor
              </select>
            </div>

            <div class="form-group">
              <label for="start">Start:</label>
              <input type="text" class="form-control controls" id="start" name="start" value="{{ old('start') }}" required>
            </div>
            
            <div class="form-group">
              <label for="destination">Destination:</label>
              <input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination') }}" required>
            </div>
            
            <div class="form-group">
              <label for="date">Date:</label>
              <input type="text" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
            </div>
            
            <div class="form-group">
              <label for="time">Time:</label>
              <input type="text" class="form-control" id="time" name="time" value="{{ old('time') }}" required>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Add</button>
            </div>

            @if (count($errors))
            <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Map</div>

        <div class="panel-body">
          <div id="map"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('googleMaps')
    <script type="text/javascript" src="/js/maps.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGsRjLvPNIqa1tHaCfIFeZ1BFlhmDu0o8&callback=initMap&libraries=places"
    async defer></script>
@endsection