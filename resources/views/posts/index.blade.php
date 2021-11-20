@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="h3 text-center font-weight-bold">Posts</div>
        @foreach($posts as $post)
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between">
                    <div>

                    <a href="{{ route('posts.show', [$post->category->slug, $post->slug]) }}">
                        {{ $post->title }}
                    </a> posted by

                    <a href="{{ route('users.show', $post->author->id) }}">
                        {{ $post->author_name }}
                    </a> at {{ $post->published_at }}

                    </div>

                    <div>comments ({{ $post->comments_count }})</div>
                </div>
                <div class="card-body">
                    {{ $post->excerpt }}
                </div>
            </div>
        @endforeach

        <div class="mt-4">{{ $posts->links() }}</div>
    </div>
@endsection
