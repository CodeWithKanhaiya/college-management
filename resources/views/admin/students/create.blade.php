<!DOCTYPE html>
<html>

<head>

    <title>Add Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            <h3>Add Student</h3>
        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach

                </div>

            @endif

            <form action="{{ route('admin.students.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- Student User --}}
<div class="mb-3">
    <label class="form-label">Student User</label>

    <select name="user_id" class="form-control" required>

        <option value="">-- Select Student User --</option>

        @foreach($users as $user)

            <option value="{{ $user->id }}"
                {{ old('user_id') == $user->id ? 'selected' : '' }}>

                {{ $user->name }} - {{ $user->email }}

            </option>

        @endforeach

    </select>

    @error('user_id')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
{{--department--}}
<div class="mb-3">

    <label class="form-label">Department</label>

    <select name="department_id" class="form-control" required>

        <option value="">
            -- Select Department --
        </option>

        @foreach($departments as $department)

            <option value="{{ $department->id }}"
                {{ old('department_id') == $department->id ? 'selected' : '' }}>

                {{ $department->name }}

            </option>

        @endforeach

    </select>

    @error('department_id')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror

</div>




                {{-- Course --}}

                <div class="mb-3">

                    <label>Course</label>

                    <select name="course_id"
                            class="form-control">

                        <option value="">
                            -- Select Course --
                        </option>

                        @foreach($courses as $course)

                            <option value="{{ $course->id }}">

                                {{ $course->course_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Admission Number --}}

                <div class="mb-3">

                    <label>Admission No</label>

                    <input type="text"
                           name="admission_no"
                           class="form-control"
                           placeholder="ADM001">

                </div>

                {{-- Roll Number --}}

                <div class="mb-3">

                    <label>Roll No</label>

                    <input type="text"
                           name="roll_no"
                           class="form-control"
                           placeholder="ROLL001">

                </div>

                {{-- Phone --}}

                <div class="mb-3">

                    <label>Phone</label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           placeholder="9876543210">

                </div>

                {{-- Gender --}}

                <div class="mb-3">

                    <label>Gender</label>

                    <select name="gender"
                            class="form-control">

                        <option value="">
                            -- Select Gender --
                        </option>

                        <option value="Male">
                            Male
                        </option>

                        <option value="Female">
                            Female
                        </option>

                        <option value="Other">
                            Other
                        </option>

                    </select>

                </div>

                {{-- Date of Birth --}}

                <div class="mb-3">

                    <label>Date of Birth</label>

                    <input type="date"
                           name="date_of_birth"
                           class="form-control">

                </div>

                {{-- Address --}}

                <div class="mb-3">

                    <label>Address</label>

                    <textarea name="address"
                              class="form-control"
                              rows="3"></textarea>

                </div>

                {{-- Admission Date --}}

                <div class="mb-3">

                    <label>Admission Date</label>

                    <input type="date"
                           name="admission_date"
                           class="form-control">

                </div>

                {{-- Photo --}}

                <div class="mb-3">

                    <label>Photo</label>

                    <input type="file"
                           name="photo"
                           class="form-control">

                </div>

                {{-- Status --}}

                <div class="mb-3">

                    <label>Status</label>

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

                    Add Student

                </button>

                <a href="{{ route('admin.students.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>