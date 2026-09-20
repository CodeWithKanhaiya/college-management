<!DOCTYPE html>
<html>

<head>
    <title>Edit Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Edit Student</h2>

        <a href="{{ route('admin.students.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card">

        <div class="card-header">
            <h4>Edit Student Information</h4>
        </div>


        <div class="card-body">

            <form action="{{ route('admin.students.update', $student->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @method('PUT')


                {{-- Student User --}}
                <div class="mb-3">

                    <label class="form-label">
                        Student User
                    </label>

                    <select name="user_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Select Student User --
                        </option>

                        @foreach($users as $user)

                            <option value="{{ $user->id }}"
                                {{ old('user_id', $student->user_id) == $user->id ? 'selected' : '' }}>

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


                {{-- Department --}}
                <div class="mb-3">

                    <label class="form-label">
                        Department
                    </label>

                    <select name="department_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Select Department --
                        </option>

                        @foreach($departments as $department)

                            <option value="{{ $department->id }}"
                                {{ old('department_id', $student->department_id) == $department->id ? 'selected' : '' }}>

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

                    <label class="form-label">
                        Course
                    </label>

                    <select name="course_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Select Course --
                        </option>

                        @foreach($courses as $course)

                            <option value="{{ $course->id }}"
                                {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }}>

                                {{ $course->course_name }}

                            </option>

                        @endforeach

                    </select>

                    @error('course_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Admission No --}}
                <div class="mb-3">

                    <label class="form-label">
                        Admission No
                    </label>

                    <input type="text"
                           name="admission_no"
                           class="form-control"
                           value="{{ old('admission_no', $student->admission_no) }}"
                           required>

                    @error('admission_no')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Roll No --}}
                <div class="mb-3">

                    <label class="form-label">
                        Roll No
                    </label>

                    <input type="text"
                           name="roll_no"
                           class="form-control"
                           value="{{ old('roll_no', $student->roll_no) }}"
                           required>

                    @error('roll_no')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Phone --}}
                <div class="mb-3">

                    <label class="form-label">
                        Phone
                    </label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone', $student->phone) }}"
                           required>

                    @error('phone')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Gender --}}
                <div class="mb-3">

                    <label class="form-label">
                        Gender
                    </label>

                    <select name="gender"
                            class="form-control"
                            required>

                        <option value="">
                            -- Select Gender --
                        </option>

                        <option value="Male"
                            {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>
                            Male
                        </option>

                        <option value="Female"
                            {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>

                        <option value="Other"
                            {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}>
                            Other
                        </option>

                    </select>

                    @error('gender')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Date of Birth --}}
                <div class="mb-3">

                    <label class="form-label">
                        Date of Birth
                    </label>

                    <input type="date"
                           name="date_of_birth"
                           class="form-control"
                           value="{{ old('date_of_birth', $student->date_of_birth?->format('Y-m-d')) }}">

                    @error('date_of_birth')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Address --}}
                <div class="mb-3">

                    <label class="form-label">
                        Address
                    </label>

                    <textarea name="address"
                              class="form-control"
                              rows="3">{{ old('address', $student->address) }}</textarea>

                    @error('address')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Admission Date --}}
                <div class="mb-3">

                    <label class="form-label">
                        Admission Date
                    </label>

                    <input type="date"
                           name="admission_date"
                           class="form-control"
                           value="{{ old('admission_date', $student->admission_date?->format('Y-m-d')) }}">

                    @error('admission_date')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Current Photo --}}
                @if($student->photo)

                    <div class="mb-3">

                        <label class="form-label">
                            Current Photo
                        </label>

                        <br>

                        <img src="{{ asset('storage/' . $student->photo) }}"
                             width="100"
                             height="100"
                             class="rounded border">

                    </div>

                @endif


                {{-- New Photo --}}
                <div class="mb-3">

                    <label class="form-label">
                        Change Photo
                    </label>

                    <input type="file"
                           name="photo"
                           class="form-control">

                    @error('photo')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Status --}}
                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-control"
                            required>

                        <option value="1"
                            {{ old('status', $student->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $student->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>


                {{-- Buttons --}}

                <button type="submit"
                        class="btn btn-primary">
                    Update Student
                </button>

                <a href="{{ route('admin.students.index') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>