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

@if($user->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: {{ $user->id }}</li>
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
                        <label for="title">Created</label>
                        <input type="text" value="{{ $user->created_at }}" class="form-control" id="title" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Updated</label>
                        <input type="text" value="{{ $user->updated_at }}" class="form-control" id="title" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
