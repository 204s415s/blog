<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="{{ asset('/css/sample.css') }}" rel="stylesheet" type="text/css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }


            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    
    <body>
        <h1>Blog Name</h1>
        
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
            
            
        @if (Route::has('login'))
            @auth
            <p class="create">[ <a href='/posts/create'>create</a> ]</p>
            @endauth
        @endif
        
        <div class="posts">
            @foreach ($posts as $post)
                <div class="post">
                    <h2 class="title"><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h2>
                    <p class="body">{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        
        <div class="paginate">
            {{ $posts->links() }}
        </div>
        
    </body>
</html>
