@extends('layouts.app')

@section('customCSS')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('customJS')
  <script src="{{ asset('js/moment.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $('#date').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD', weekStart : 1, time: false, minDate : new Date() });
  </script>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="well">
          <form class="form" action="/rides" method="get">
            <div class="form-group">
              <label for="start">Start:</label>
              <input class="form-control" type="text" name="start" id="start" value="{{ app('request')->input('start') }}">
            </div>
            <div class="form-group">
              <label for="destination">Destination:</label>
              <input class="form-control" type="text" name="destination" id="destination" value="{{ app('request')->input('destination') }}">
            </div>
            <div class="form-group">
              <label for="date">Date</label>
              <input type="text" class="date-picker form-control" name="date" id="date" value="{{ app('request')->input('date') }}">
            </div>
            <div class="form-group">
              <button class="btn btn-default btn-block btn-danger" type="submit" name="button">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-8">
        <div class="list-group">
          @foreach ($rides as $ride)
            <div class="list-group-item">
              <div class="">Ride about {{ $ride->creator->fullName() }} </div>

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
