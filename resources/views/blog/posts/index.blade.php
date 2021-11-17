<table>
    <tr>
        <td><strong>id</strong></td>
        <td><strong>title</strong></td>
        <td><strong>excerpt</strong></td>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->excerpt }}</td>
        </tr>
    @endforeach
</table>
