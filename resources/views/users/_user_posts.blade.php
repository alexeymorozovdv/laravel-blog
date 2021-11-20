<div class="card mt-4">
    <div class="card-header">
        User's posts ({{ $posts->count() }})
    </div>
</div>

@foreach($posts as $post)
    <div class="card mt-2">
        <div class="card-header">
            {{ $post->created_at }}
        </div>
        <div class="card-body">
            <a href="{{ route('admin.posts.edit', $post->id) }}">
                {{ $post->title }}
            </a>
        </div>

    </div>
@endforeach
