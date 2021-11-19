@extends('layouts.app')

@section('content')

    @php /** @var \App\Models\Post $post */ @endphp

    <div class="container">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
            @method('PATCH')
            @csrf

            @include('admin.partials._result_messages')

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('admin.posts.includes._item_edit_main_col')
                </div>
                <div class="col-md-4">
                    @include('admin.posts.includes._item_edit_add_col')
                </div>
            </div>
        </form>

        @if(request()->route()->getName() == 'admin.posts.edit')
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <div class="row justify-content-center mt-2">
                    <div class="col-md-8">
                        <div class="card card-block">
                            <div class="card-body ml-auto">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        @endif
    </div>

@endsection
