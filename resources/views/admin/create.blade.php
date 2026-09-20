<!DOCTYPE html>
<html>

<head>

    <title>Add Teacher</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            <h3>Add Teacher</h3>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    @foreach($errors->all() as $error)

                        <div>{{ $error }}</div>

                    @endforeach

                </div>

            @endif

            <form action="{{ route('admin.teachers.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- User --}}

                <div class="mb-3">

                    <label class="form-label">
                        Teacher User
                    </label>

                    <select name="user_id"
                            class="form-control">

                        <option value="">
                            Select Teacher User
                        </option>

                        @foreach($users as $user)

                            <option value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}>

                                {{ $user->name }} - {{ $user->email }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Department --}}

                <div class="mb-3">

                    <label class="form-label">
                        Department
                    </label>

                    <select name="department_id"
                            class="form-control">

                        <option value="">
                            Select Department
                        </option>

                        @foreach($departments as $department)

                            <option value="{{ $department->id }}"
                                {{ old('department_id') == $department->id ? 'selected' : '' }}>

                                {{ $department->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Employee ID --}}

                <div class="mb-3">

                    <label class="form-label">
                        Employee ID
                    </label>

                    <input type="text"
                           name="employee_id"
                           class="form-control"
                           value="{{ old('employee_id') }}"
                           placeholder="EMP001">

                </div>

                {{-- Phone --}}

                <div class="mb-3">

                    <label class="form-label">
                        Phone
                    </label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone') }}"
                           placeholder="9876543210">

                </div>

                {{-- Qualification --}}

                <div class="mb-3">

                    <label class="form-label">
                        Qualification
                    </label>

                    <input type="text"
                           name="qualification"
                           class="form-control"
                           value="{{ old('qualification') }}"
                           placeholder="M.Tech / MCA / PhD">

                </div>

                {{-- Designation --}}

                <div class="mb-3">

                    <label class="form-label">
                        Designation
                    </label>

                    <input type="text"
                           name="designation"
                           class="form-control"
                           value="{{ old('designation') }}"
                           placeholder="Assistant Professor">

                </div>

                {{-- Joining Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        Joining Date
                    </label>

                    <input type="date"
                           name="joining_date"
                           class="form-control"
                           value="{{ old('joining_date') }}">

                </div>

                {{-- Address --}}

                <div class="mb-3">

                    <label class="form-label">
                        Address
                    </label>

                    <textarea name="address"
                              class="form-control"
                              rows="3"
                              placeholder="Teacher address">{{ old('address') }}</textarea>

                </div>

                {{-- Photo --}}

                <div class="mb-3">

                    <label class="form-label">
                        Photo
                    </label>

                    <input type="file"
                           name="photo"
                           class="form-control">

                </div>

                {{-- Status --}}

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

                    Save Teacher

                </button>

                <a href="{{ route('admin.teachers.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>