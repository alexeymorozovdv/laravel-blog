@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">
                        Create a new category
                    </a>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Parent</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                @php /** @var \App\Models\Category $category */ @endphp
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}">
                                            {{ $category->title }}
                                        </a>
                                    </td>
                                    <td @if($category->parent_id == 0) style="color: #a5abaa" @endif>
                                        {{ $category->parentTitle }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="mt-3">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
