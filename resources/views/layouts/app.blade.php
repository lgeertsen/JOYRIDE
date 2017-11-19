<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.header')

<body>
    <div id="app">
        @include('layouts.nav')

        @yield('content')
    </div>

    <!-- Scripts -->
    @include('layouts.js')
</body>
</html>
