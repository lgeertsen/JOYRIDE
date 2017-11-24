@extends('layouts.app')

@section('customCSS')
  <link href="https://fonts.googleapis.com/css?family=Oswald:700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css" />
@endsection

@section('customJS')
  <script src="{{ asset('js/navbar.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/moment.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $('#date').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD', weekStart : 1, time: false, minDate : new Date() });
  </script>
@endsection

@section('content')
<section id="header">
  <div id="headerwrap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-8 col-md-offset-2">
					<h1>JOYRIDE</h1>
					<h6>The n°1 carpooling service</h6>
				</div>
			</div><!-- --/row ---->
		</div><!-- --/container ---->
	</div>
</section>

<section id="searchArea">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-8 col-md-offset-2">
        <form class="form-inline">
          
          {{ csrf_field() }}
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <input type="text" class="form-control" name="start" id="start" placeholder="Start">
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="form-group">
                <input type="email" class="form-control" name="destination" id="destination" placeholder="Destination">
              </div>
            </div>
            
            <div class="col-md-3">
              <div class="form-group">
                <input type="text" class="form-control" name="date" id="date" placeholder="Date">
              </div>
            </div>
            
            <div class="col-md-3">
              <button type="submit" class="btn btn-default btn-block btn-danger">Search Ride</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</section>

@include('layouts.footer')
@endsection