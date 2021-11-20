@extends('layouts.app')

@section('content')
    <div class="container">

        @include('admin.partials._result_messages')

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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Number of Posts</th>
                                <th>Number of Comments</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                @php /** @var \App\Models\Post $user */ @endphp
                                <tr>

                                    <td>{{ $user->id }}</td>

                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}">
                                            {{ $user->name }}
                                        </a>
                                    </td>

                                    <td>
                                        <a>
                                            {{ $user->email }}
                                        </a>
                                    </td>

                                    <td>
                                        <a>
                                            {{ $user->created_at }}
                                        </a>
                                    </td>

                                    <td>{{ $user->posts_count }}</td>
                                    <td>{{ $user->comments_count }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

                @if($users->total() > $users->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            {{ $users->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
