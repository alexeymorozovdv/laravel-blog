@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">
                        Create a new post
                    </a>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Published At</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($posts as $post)
                                @php /** @var \App\Models\Post $post */ @endphp
                                <tr @if(!$post->is_published) style="background-color: #E0E0E0" @endif>

                                    <td>{{ $post->id }}</td>
                                    <td>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}">
                                            {{ $post->title }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            {{ $post->user_name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $post->category_id) }}">
                                            {{ $post->category_title }}
                                        </a>
                                    </td>
                                    <td>{{ $post->published_at }}</td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

                @if($posts->total() > $posts->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            {{ $posts->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
