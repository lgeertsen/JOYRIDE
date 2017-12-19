@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="well">
          <form class="form-inline" action="/rides" method="get">
            <div class="input-group">
              <label for="start">Start:</label>
              <input type="text" name="start" id="start" value="{{ $rides[0]->start }}">
            </div>
            <div class="input-group">
              <label for="destination">Destination:</label>
              <input type="text" name="destination" id="destination" value="{{ $rides[0]->destination }}">
            </div>
            <div class="input-group">
              <button class="btn btn-default btn-block btn-danger" type="submit" name="button">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-8">
        <div class="list-group">
          @foreach ($rides as $ride)
            <div class="list-group-item">
              <div class="">Ride about {{ $ride->creator->name() }} </div>

              <div class="">
                <div>
                  Date: {{ $ride->date }}
                </div>
                <div>
                  Hour: {{ $ride->time }}
                </div>
                <div>
                  Seats: {{ $ride->seats }}
                </div>
                <div>
                  From: {{ $ride->start }}
                </div>
                <div>
                  To: {{ $ride->destination }}
                </div>
                <a href="{{ route('ride.show', ['user' => $ride->creator->id, 'ride' => $ride->id]) }}">Show</a>

              </div>
            </div>
          @endforeach

        </div>

      </div>
    </div>
  </div>
@endsection
