@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <div>

                    <a href="{{ route('posts.show', [$post->category->slug, $post->slug]) }}">
                        {{ $post->title }}
                    </a> posted by

                    {{-- {{ route('users.show', $post->author->id) }}--}}
                    <a href="">
                        {{ $post->author_name }}
                    </a> at {{ $post->published_at }}

                </div>

            </div>
            <div class="card-body">
                {{ $post->content_raw }}
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-header text-center">
                Comments ({{ $post->comments_count ?? '0' }})
            </div>
        </div>
        @if($post->comments_count)
            @foreach($post->comments as $comment)
                <div class="card mt-2">
                    <div class="card-header">
                        <a href="{{ route('users.show', $comment->author->id) }}">
                            {{ $post->author->name }}
                        </a> comments at {{ $comment->created_at }}
                    </div>
                    <div class="card-body">
                        {{ $comment->body }}
                    </div>
                </div>
            @endforeach
        @endif

    </div>
@endsection
