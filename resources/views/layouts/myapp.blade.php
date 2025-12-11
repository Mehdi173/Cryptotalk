<html>
    <head>
        <title>Cryptotalk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1>@yield('title')</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            @if (session('message'))
                <p><b>{{ session('message') }}</b></p>
            @endif

            @yield('content')
        </div>
    </body>
</html>