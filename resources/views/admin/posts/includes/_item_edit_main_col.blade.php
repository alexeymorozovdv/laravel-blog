<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                @if($post->is_published)
                    Published
                @else
                    Not Published
                @endif
            </div>

            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">
                            Main Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#adddata" class="nav-link" data-toggle="tab" role="tab">
                            Additional Data
                        </a>
                    </li>
                </ul>
                <br>

                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title"
                                   type="text"
                                   value="{{ old('title', $post->title) }}"
                                   id="title"
                                   class="form-control"
                                   minlength="3"
                                   required
                            >
                        </div>

                        <div class="form-group">
                            <label for="content_raw">Content</label>
                            <textarea name="content_raw"
                                      rows="15"
                                      id="content_raw"
                                      class="form-control"
                            >{{ old('content_raw', $post->content_raw) }}</textarea>
                        </div>

                    </div>

                    <div class="tab-pane active" id="adddata" role="tabpanel">

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug"
                                   type="text"
                                   value="{{ old('slug', $post->slug)}}"
                                   id="slug"
                                   class="form-control"
                            >
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    required>
                                <option value="0">None</option>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == old('category_id', $post->category_id)) selected @endif
                                    >
                                        {{ $categoryOption->id }}. {{ $categoryOption->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea name="excerpt"
                                      rows="7"
                                      id="excerpt"
                                      class="form-control"
                            >{{ old('excerpt', $post->excerpt) }}</textarea>
                        </div>

                        <div class="form-check">
                            <input type="hidden"
                                   name="is_published"
                                   value="0">

                            <input name="is_published"
                                   id="is_published"
                                   class="form-check-input"
                                   type="checkbox"
                                   value="1"
                                   @if($post->is_published)
                                   checked="checked"
                                   @endif
                            >
                            <label class="form-check-label" for="is_published">
                                Published
                            </label>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

