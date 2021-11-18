@extends('layouts.app')

@section('content')
    <div class="container">
        <table>
            <tr>
                <td><strong>id</strong></td>
                <td><strong>title</strong></td>
                <td><strong>created at</strong></td>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
