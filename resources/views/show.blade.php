<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    
    <body>
        <h1>Blog Name</h1>
            <div class="edit">[ <a href="/posts/{{ $post->id }}/edit">edit</a> ]</div>
            <form action="/posts/{{$post->id}}" id="form_delete" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <input type="submit" style="display:none" />
                <p class="delete">[ <span onclick="deletePost()" >delete</span> ]</p>
            </form>
            <div class="post">
                <h2 class="title">{{ $post->title }}</h2>
                <p class="body">{{ $post->body }}</p>
                <p class="updated_at">{{ $post->updated_at }}</p>
            </div>
            <div class="back">[ <a href="/">back</a> ]</div>
            <script>
                function deletePost() {
                    'use strict';
                    if (confirm('本当に削除しますか？')) {
                        document.getElementById('form_delete').submit();
                    }
                }
            </script>
    </body>
        