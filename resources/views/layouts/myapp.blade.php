<html>
    <head>
        <title>Cryptotalk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        @if(auth()->check())
            <div class="bg-dark text-white py-2 px-3 mb-4 text-end">
                Logged in as <strong>{{ auth()->user()->name }}</strong>
            </div>
        @else
            <div class="bg-dark text-white py-2 px-3 mb-4 text-end">
                Not logged in
            </div>
        @endif

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