<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

       
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/')}}">Authtication</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
               
                @if(Auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard')}}">User Dashboard</a>
                </li>
             
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('registerForm')}}">Register</a>
                  </li>
                  
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('loginForm')}}">Login</a>
                  </li>
             
                @endif
             
             
              </ul>
              
            </div>
          </nav>

            @if (session('status'))
                <div class="text-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="text-danger">
                    {{ session('error') }}
                </div>
            @endif
    </body>
</html>
