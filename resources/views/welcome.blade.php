@extends('layouts.app')

@section('customCSS')
  <link href="https://fonts.googleapis.com/css?family=Oswald:700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css" />
@endsection

@section('customJS')
  <script src="{{ asset('js/navbar.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/moment.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/maps.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $('#date').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD', weekStart : 1, time: false, minDate : new Date() });
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGsRjLvPNIqa1tHaCfIFeZ1BFlhmDu0o8&callback=initMap&libraries=places"
    async defer></script>
  <script type="text/javascript">
    var input = document.getElementById("start");
    var header = document.getElementById("headerwrap");
    start.onclick = function() {
      header.className = "animated slideOutUp";
    };
  </script>
@endsection

@section('content')
<section id="header">
  <div id="headerwrap" class="">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2 text-center">
				  <!--<img style="width: 80%;" src="{{ asset('img/Logo_Joyride.png') }}"></img>-->
					<h1>JOYRIDE</h1>
					<h6>The n°1 carpooling service</h6>
				</div>
			</div><!-- --/row ---->
		</div><!-- --/container ---->
	</div>
	<div id="headerMap">
	  <div id=map></div>
	</div>
</section>

<section id="searchArea">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-8 col-md-offset-2">
        <form class="form-inline" action="/rides" method="get">

          <div class="row">
            <div class="col-md-3">
              <div class="input-field">
                <input type="text" class="validate" name="start" id="start" placeholder="Start">
              </div>
            </div>

            <div class="col-md-3">
              <div class="input-field">
                <input type="text" class="validate" name="destination" id="destination" placeholder="Destination">
              </div>
            </div>

            <div class="col-md-3">
              <div class="input-field">
                <input type="text" class="date-picker" name="date" id="date" placeholder="Date">
              </div>
            </div>

            <div class="col-md-3">
              <div class="input-field">
                <button type="submit" class="btn red">Search Ride</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>

@include('layouts.footer')
@endsection
