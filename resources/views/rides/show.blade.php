@extends('layouts.app')

@section('customJS')
  <script src="{{ asset('js/maps.js') }}" type="text/javascript"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGsRjLvPNIqa1tHaCfIFeZ1BFlhmDu0o8&callback=initMap&libraries=places"
  async defer></script>

  <script type="text/javascript">
  showTraject('{{ $ride->start }}', '{{ $ride->destination }}');
  </script>
@endsection

@section('content')
  <div class="container">
    <h1>{{ $ride->start }} <i class="fa fa-long-arrow-right" aria-hidden="true"></i> {{ $ride->destination }}</h1>
    <div class="row">
      @auth

      <participate :passengers="{{ $passengers }}" :attributes="{{ $ride }}" :userid="{{ auth()->id() }}" :count="{{ $ride->seats - $passengerCount }}" inline-template v-cloak>

        <div class="col-md-7">

          <div class="panel panel-default">
            <div class="panel-heading">
              Ride by
              <a href="{{ route('profile', ['user' => $ride->creator->id]) }} }}">{{ $ride->creator->fullName() }}</a>
            </div>

            <div class="panel-body">
              <h4>Total Seats: {{ $ride->seats }}</h4>
              <h4>Seats left: <span v-text="passengerCount"></span></h4>
              {{-- @if (!$passengers->contains('user_id', auth()->id())) --}}
                @if ($ride->creator->id != auth()->id())
                  @if ($passengerCount < $ride->seats || $passengers->contains('user_id', auth()->id()))
                    {{-- <form action="/passengers/{{ $ride->id }}" method="post">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-success">Participate</button>
                  </form> --}}
                    <div class="">
                      <button class="btn btn-success" @click="participate" v-show="showJoin">Join Ride</button>
                      <button class="btn btn-danger" @click="cancel" v-show="showCancel">Cancel joining ride</button>
                    </div>
                  @endif
                @endif
            {{-- @else
            <form action="/passengers/{{ $ride->id }}/cancel" method="post">
            {{ csrf_field() }}

            <button type="submit" class="btn btn-danger">Cancel participation</button>
          </form>
        @endif --}}
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
          <h5 v-if=showCancel>{{ auth()->user()->fullName() }}</h5>
        @forelse ($passengers as $passenger)
          <h5>
            @if($passenger->user_id != auth()->id())
              {{ $passenger->person->fullName() }}
            @endif
          </h5>
        @empty
            <h5 v-else>There are no passengers</h5>
        @endforelse
      </div>
    </div>
  </div>
</participate>
@endauth

@guest
  <div class="col-md-7">

    <div class="panel panel-default">
      <div class="panel-heading">
        Ride by
        <a href="{{ route('profile', ['user' => $ride->creator->id]) }} }}">{{ $ride->creator->fullName() }}</a>
      </div>

      <div class="panel-body">
        <h4>Total Seats: {{ $ride->seats }}</h4>
        <h4>Seats left: {{ $ride->seats - $passengerCount }}</h4>
        {{-- @if (!$passengers->contains('user_id', auth()->id())) --}}
            @if ($passengerCount < $ride->seats)
              <form action="/passengers/{{ $ride->id }}" method="post">
              {{ csrf_field() }}

              <button type="submit" class="btn btn-success">Participate</button>
            </form>
            @endif
      {{-- @else
      <form action="/passengers/{{ $ride->id }}/cancel" method="post">
      {{ csrf_field() }}

      <button type="submit" class="btn btn-danger">Cancel participation</button>
    </form>
  @endif --}}
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
    <h5>
        {{ $passenger->person->fullName() }}
    </h5>
  @empty
      <h5>There are no passengers</h5>
  @endforelse
</div>
</div>
</div>
@endguest


<div class="col-md-5">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>Map</h4>
    </div>

    <div class="panel-body">
      <div id="map"></div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
