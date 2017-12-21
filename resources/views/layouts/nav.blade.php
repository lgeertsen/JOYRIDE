@section('customCSS')
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
@endsection

@section('customJS')
  <script type="text/javascript">
  var placeSearch, autocomplete, autocomplete2, geocoder;
  var options = {
    types: ['(cities)'],
    componentRestrictions: {country: "fr"}
  };

function initAutocomplete() {
  geocoder = new google.maps.Geocoder();
  autocomplete = new google.maps.places.Autocomplete(
    (document.getElementById('startNav')), options);
  autocomplete2 = new google.maps.places.Autocomplete(
    (document.getElementById('destinationNav')), options);
}

  // startNavAutocomplete = new google.maps.places.Autocomplete(startNavInput, options);
  // destinationNavAutocomplete = new google.maps.places.Autocomplete(destinationNavInput, options);
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGsRjLvPNIqa1tHaCfIFeZ1BFlhmDu0o8&libraries=places&callback=initAutocomplete"
    async defer></script>
@endsection

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            @guest
              <a class="navbar-brand" href="{{ url('/') }}">
            @endguest
            @auth
              <a class="navbar-brand" href="{{ route('profile', ['user' => Auth::user()->id]) }}">
            @endauth
                Joyride
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                {{-- <li><a href="{{ route('rides') }}">Rides</a></li> --}}
                <li><a href="{{ route('rides.new') }}">Create Ride</a></li>
                {{-- <li><a href="{{ route('cars') }}">Cars</a></li> --}}
            </ul>

            <form class="navbar-form navbar-left" action="/rides" method="get">
              <div class="form-group">
                <input class="form-control" type="text" name="start" id="startNav" value="{{ app('request')->input('start') }}" placeholder="Start">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="destination" id="destinationNav" value="{{ app('request')->input('destination') }}" placeholder="Destination">
              </div>
              <div class="form-group">
                <input type="date" class="date-picker form-control" name="date" id="dateNav" value="{{ app('request')->input('date') }}" placeholder="Date">
              </div>
              <div class="form-group">
                <button class="btn btn-default btn-block btn-danger" type="submit" name="button">Search</button>
              </div>
            </form>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->fullName() }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile', ['user' => Auth::user()->id]) }}">Profile</a></li>
                            @if (Auth::user()->admin)
                              <li><a href="{{ route('admin') }}">Admin Panel</a></li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
