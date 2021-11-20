@extends('layouts.app')

@section('content')

    @php /** @var \App\Models\User $user */ @endphp

    <div class="container">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @method('PATCH')
            @csrf

            @include('admin.partials._result_messages')

            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-header">
                                    User's profile
                                </div>

                                <div class="card-body">
                                    Name: {{ $user->name }}
                                </div>
                                <div class="card-body">
                                    Email: {{ $user->email }}
                                </div>

                                <!-- TODO: change visibility -->
                                <div class="card-body">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                    <div class="card">
                        <div class="card-header">
                            Account was created at {{ $user->created_at }}
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div>User's posts ({{ $user->posts->count() }})</div>
                            <div class="mt-2">User's comments ({{ $user->comments->count() }})</div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
