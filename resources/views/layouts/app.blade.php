<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
      window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>

    @stack('styles')
</head>
<body>
    <div id="app">
        @include('partials.nav')

        @yield('content')

        {{--<flash message="{{ session('flash') }}"></flash>--}}
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
