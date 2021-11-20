@extends('layouts.app')

@section('content')

    @php /** @var \App\Models\User $user */ @endphp

    <div class="container">
        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
            @method('PATCH')
            @csrf

            @include('admin.partials._result_messages')

            <div class="row justify-content-center">

                <div class="col-md-8">
                    @include('users._item_edit_main_col')

                    @include('users._user_posts')
                </div>

                <div class="col-md-4">
                    @include('users._item_edit_add_col')

                    <div class="card mt-4">
                        <div class="card-header">
                            User's comments ({{ $comments->count() }})
                        </div>
                    </div>

                    @foreach($comments as $comment)
                        <div class="card mt-2">
                            <div class="card-header">
                                {{ $comment->post->title }}
                            </div>
                            <div class="card-body">
                                <a href="{{ route('admin.comments.edit', $comment->id) }}">
                                    {{ $comment->body }}
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>

@endsection
