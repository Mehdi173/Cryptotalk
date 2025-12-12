<html>
    <head>
        <title>Cryptotalk</title>
        <!-- Bootstrap import -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Livewire styles import -->
        @livewireStyles
    </head>
    <body>
        <!-- Adding the top bar which shows the user name (when logged in) -->
        @if(auth()->check())
            <div class="bg-dark text-white py-2 px-3 mb-4 text-end">
                Logged in as <strong>{{ auth()->user()->name }}</strong>
            </div>
        @else
            <div class="bg-dark text-white py-2 px-3 mb-4 text-end">
                Not logged in (
                <a href="{{ route('login') }}" class="text-white text-decoration-underline">
                    Login here
                </a>
                )
            </div>
        @endif

        <h1>@yield('title')</h1>

        <!-- Displaying errors on top of the context such as the controller validation error messages -->
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
            <!-- Showing messages to inform the user than an action like creation or deletion was completed -->
            @if (session('message'))
                <p class="text-end"><b>{{ session('message') }}</b></p>
            @endif

            @yield('content')
        </div>
        @livewireScripts
    </body>
</html>