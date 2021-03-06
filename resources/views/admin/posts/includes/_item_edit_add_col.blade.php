<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<br>

@if($post->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: {{ $post->id }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Author</label>
                        <input type="text" value="{{ $post->author->name }}" class="form-control" id="title" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Created</label>
                        <input type="text" value="{{ $post->created_at }}" class="form-control" id="title" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Published</label>
                        <input type="text" value="{{ $post->published_at }}" class="form-control" id="title" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Updated</label>
                        <input type="text" value="{{ $post->updated_at }}" class="form-control" id="title" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Deleted</label>
                        <input type="text" value="{{ $post->deleted_at }}" class="form-control" id="title" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
