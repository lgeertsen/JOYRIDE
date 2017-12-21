@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="list-group">
          @foreach ($rides as $ride)
            <div class="list-group-item">
              <div class="">Ride by {{ $ride->creator->fullName() }} </div>

              <div class="">
                <h3>Price: {{ $ride->fullPrice() }}€</h3>
                <h5>{{ $ride->distanceToKm() }}km</h5>
                <h5>{{ $ride->durationToText() }}</h5>
                {{ $ride->duration }}
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
