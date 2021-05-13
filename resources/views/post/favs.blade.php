<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="{{ asset('/css/sample.css') }}" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 20px;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

        </style>
        
    </head>
    
    <body>
        <h1>Your favorite posts</h1>
        
        @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
        <div class="favs">
            @foreach ($favs as $fav)
                <div class="fav">
                    <p class="title"><a href="/posts/{{$fav->post->id}}">{{ $fav->post->title }}</p>
                </div>
            @endforeach
        </div>
    
    </body>
</html>
