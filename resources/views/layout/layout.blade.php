<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <header class="header">
            @include('navigation.nav')
        </header>
        <main>
            @yield('body')
        </main>
    </body>

@auth
    <script src="{{ URL::asset('js/toggleNav.js') }}"></script>
@endauth
    <script src="{{ URL::asset('js/alerts.js') }}"></script>
</html>