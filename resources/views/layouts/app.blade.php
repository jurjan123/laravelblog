<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
    </head>
    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                @if(Auth::user()->isAdmin && $_SERVER["REQUEST_URI"] != "/dashboard" && $_SERVER["REQUEST_URI"] != "/profile")
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-2  sm-3 ">
                            @include('includes.sidebar')
                        </div>
            
                
                        <div class="col-md-9 sm-3">
                            {{ $slot }}
                        </div>

                    </div>
                    
                </div>
                @else
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-9 sm-3 ">
                            {{ $slot }}
                        </div>

                    </div>
                </div>
                @endif
            </main>
            

        </div>
       
    </body>
</html>
