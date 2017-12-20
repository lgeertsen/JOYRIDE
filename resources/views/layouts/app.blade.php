<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.header')

<body>
  <div id="app">
    @include('layouts.nav')

    <div id="content">
      @yield('content')
    </div>

    <flash message="{{ session('flash') }}"></flash>
  </div>

  <!-- Scripts -->
  @include('layouts.js')
</body>
</html>
