@extends('layouts.app')

@section('content')

    @php /** @var \App\Models\Category $category */ @endphp

    <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="container">

            @include('admin.categories.includes._errors')

            @include('admin.categories.includes._success_message')

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('admin.categories.includes._item_edit_main_col')
                </div>
                <div class="col-md-4">
                    @include('admin.categories.includes._item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection
