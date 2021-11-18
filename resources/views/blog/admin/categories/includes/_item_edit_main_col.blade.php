<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="" tablist>
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link-active" data-toggle="tab" role="tab">
                            Main Data
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
                                   value="{{ old('title', $category->title) }}"
                                   id="title"
                                   class="form-control"
                                   minlength="3"
                                   required
                            >
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug"
                                   type="text"
                                   value="{{ old('slug', $category->slug)}}"
                                   id="slug"
                                   class="form-control"
                            >
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Parent</label>
                            <select name="parent_id"
                                    id="parent_id"
                                    class="form-control"
                                    required
                            >
                                <option value="0">None</option>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == old('parent_id', $category->parent_id)) selected @endif
                                    >
                                        {{ $categoryOption->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description"
                                      rows="3"
                                      id="description"
                                      class="form-control"
                            >{{ old('description', $category->description) }}</textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

