@extends('layouts.app')

@section('content')

    @php /** @var \App\Models\Post $post */ @endphp

    <form action="{{ route('admin.posts.store', $post->id) }}" method="post">
        @csrf
        <div class="container">

            @include('admin.partials._result_messages')

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('admin.posts.includes._item_edit_main_col')
                </div>
                <div class="col-md-4">
                    @include('admin.posts.includes._item_edit_add_col')
                </div>
            </div>

        </div>
    </form>

@endsection
