<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
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
                @auth
                    <div class="edit">[ <a href="/posts/{{ $post->id }}/edit">edit</a> ]</div>
                    <form action="/posts/{{$post->id}}" id="form_delete" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" style="display:none" />
                        <p class="delete">[ <span onclick="DeletePost()" >delete</span> ]</p>
                    </form>
                    <div>
                @if($post->is_faved_by_auth_user())
                <a href="{{ route('posts.unfavs', ['id' => $post->id]) }}" class="btn btn-success btn-sm">♥</a>
                @else
                <a href="{{ route('posts.favs', ['id' => $post->id]) }}" class="btn btn-success btn-sm">♡</a>
                @endif
            </div>
                @endauth
            @endif
            
            
            
            <div class="post">
                <p class="user">記事作成者：{{ $post->user->name }}</p>
                <h2 class="title">{{ $post->title }}</h2>
                <p class="body">{{ $post->body }}</p>
                <p class="updated_at">{{ $post->updated_at }}</p>
            </div>
            <div class="back">[ <a href="/">back</a> ]</div>
            <script>
                function DeletePost() {
                    'use strict';
                    if (confirm('本当に削除しますか？')) {
                        document.getElementById('form_delete').submit();
                    }
                }
            </script>
    </body>
        