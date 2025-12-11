<html>
    <head>
        <title>My Application - @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1>My Application - @yield('title')</h1>

        <div>
            @if (session('message'))
                <p><b>{{ session('message') }}</b></p>
            @endif

            @yield('content')
        </div>
    </body>
</html>