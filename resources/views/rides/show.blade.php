@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $ride->start }} <i class="fa fa-long-arrow-right" aria-hidden="true"></i> {{ $ride->destination }}</h1>
  <div class="row">
    <div class="col-md-8">

      <div class="panel panel-default">
        <div class="panel-heading">Ride about {{ $ride->creator->fullName() }} </div>

        <div class="panel-body">

          <form action="/passengers/{{ $ride->id }}" method="post">
            {{ csrf_field() }}

            <button type="submit" class="btn green">Participate</button>
          </form>

          <h2>Seats: {{ $ride->seats }}</h2>

          <div>
            Date: {{ $ride->date }}
          </div>
          <div>
            Hour: {{ $ride->time }}
          </div>
          <div>
            Car: {{ $ride->car->description() }}
          </div>
          <div>
            From: {{ $ride->start }}
          </div>
          <div>
            To: {{ $ride->destination }}
          </div>
        </div>
      </div>

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3>Passengers</h3>
        </div>

        <div class="panel-body">
            @forelse ($passengers as $passenger)
              {{ $passenger->person->fullName() }}
            @empty
              <h5>There are no passengers</h5>
            @endforelse
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
