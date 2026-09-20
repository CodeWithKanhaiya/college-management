<!DOCTYPE html>
<html>
<head>

    <title>Edit Department</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            <h3>Edit Department</h3>

        </div>


        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    @foreach($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <form action="{{ route('admin.departments.update', $department->id) }}"
                  method="POST">

                @csrf

                @method('PUT')


                <div class="mb-3">

                    <label class="form-label">
                        Department Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $department->name) }}">

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Department Code
                    </label>

                    <input type="text"
                           name="code"
                           class="form-control"
                           value="{{ old('code', $department->code) }}">

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea name="description"
                              class="form-control"
                              rows="4">{{ old('description', $department->description) }}</textarea>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-control">

                        <option value="1"
                            {{ $department->status ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ !$department->status ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Update Department

                </button>


                <a href="{{ route('admin.departments.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>