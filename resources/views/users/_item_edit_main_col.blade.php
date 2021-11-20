<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                User Edit
            </div>

            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        Main Data
                    </li>
                </ul>
                <br>

                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name"
                                   type="text"
                                   value="{{ old('name', $user->name) }}"
                                   id="name"
                                   class="form-control"
                                   minlength="3"
                                   required
                            >
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email"
                                   type="email"
                                   id="email"
                                   class="form-control"
                                   value="{{ old('email', $user->email) }}"
                                   required
                            >
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

