@extends('layouts.app')

@section('content')

    @php /** @var \App\Models\Category $category */ @endphp

    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div class="container">

            @include('admin.partials._result_messages')

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('admin.categories.includes._item_edit_main_col')
                </div>

                <div class="col-md-4">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
