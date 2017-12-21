@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="list-group">
          @foreach ($rides as $ride)
            <div class="list-group-item">
                <h3>{{ $ride->start }} <i class="fa fa-long-arrow-right" aria-hidden="true"></i> {{ $ride->destination }}</h3>

                <h1 class="pull-right">{{ $ride->fullPrice() }}€</h1>

                <h5>Departure: {{ DateTime::createFromFormat('Y-m-d', $ride->date)->format('D jS F ') }} at {{ date('G:i', strtotime($ride->time)) }}</h5>

            <h5>Driver: {{ $ride->creator->fullName() }}</h5>

            <h4>Seats left: {{ $ride->seats - $ride->passengers()->get()->count() }}</h4>
                <a class="btn btn-primary btn-xs" href="{{ route('ride.show', ['user' => $ride->creator->id, 'ride' => $ride->id]) }}">Show</a>

              </div>
          @endforeach

        </div>

      </div>
    </div>
  </div>
@endsection
