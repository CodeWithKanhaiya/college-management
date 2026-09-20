<!DOCTYPE html>
<html>
<head>

    <title>Add Department</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            <h3>Add Department</h3>

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


            <form action="{{ route('admin.departments.store') }}"
                  method="POST">

                @csrf


                <div class="mb-3">

                    <label class="form-label">
                        Department Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           placeholder="Enter department name">

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Department Code
                    </label>

                    <input type="text"
                           name="code"
                           class="form-control"
                           value="{{ old('code') }}"
                           placeholder="Example: CSE">

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea name="description"
                              class="form-control"
                              rows="4"
                              placeholder="Enter description">{{ old('description') }}</textarea>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-control">

                        <option value="1">
                            Active
                        </option>

                        <option value="0">
                            Inactive
                        </option>

                    </select>

                </div>


                <button type="submit"
                        class="btn btn-success">

                    Save Department

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