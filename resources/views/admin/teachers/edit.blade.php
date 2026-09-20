@extends('layouts.admin')

@section('title', 'Edit Teacher')

@section('content')

<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex flex-column flex-md-row
                justify-content-between align-items-md-center
                gap-2 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Edit Teacher
            </h2>

            <p class="text-muted mb-0">
                Update teacher information
            </p>
        </div>

        <a href="{{ route('admin.teachers.index') }}"
           class="btn btn-secondary">

            ← Back to Teachers

        </a>

    </div>


    {{-- Validation Errors --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route(
                'admin.teachers.update',
                $teacher->id
            ) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @method('PUT')


                <div class="row g-3">


                    {{-- Teacher User --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Teacher User
                        </label>

                        <select name="user_id"
                                class="form-select @error('user_id') is-invalid @enderror">

                            <option value="">
                                Select Teacher User
                            </option>

                            @foreach($users as $user)

                                <option value="{{ $user->id }}"
                                    {{ old(
                                        'user_id',
                                        $teacher->user_id
                                    ) == $user->id ? 'selected' : '' }}>

                                    {{ $user->name }}
                                    -
                                    {{ $user->email }}

                                </option>

                            @endforeach

                        </select>

                        @error('user_id')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Department --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Department
                        </label>

                        <select name="department_id"
                                class="form-select @error('department_id') is-invalid @enderror">

                            <option value="">
                                Select Department
                            </option>

                            @foreach($departments as $department)

                                <option value="{{ $department->id }}"
                                    {{ old(
                                        'department_id',
                                        $teacher->department_id
                                    ) == $department->id ? 'selected' : '' }}>

                                    {{ $department->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('department_id')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Employee ID --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Employee ID
                        </label>

                        <input type="text"
                               name="employee_id"
                               class="form-control @error('employee_id') is-invalid @enderror"
                               value="{{ old(
                                   'employee_id',
                                   $teacher->employee_id
                               ) }}"
                               placeholder="Example: EMP001">

                        @error('employee_id')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Phone --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Phone
                        </label>

                        <input type="text"
                               name="phone"
                               class="form-control @error('phone') is-invalid @enderror"
                               value="{{ old(
                                   'phone',
                                   $teacher->phone
                               ) }}"
                               placeholder="Enter phone number">

                        @error('phone')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Qualification --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Qualification
                        </label>

                        <input type="text"
                               name="qualification"
                               class="form-control @error('qualification') is-invalid @enderror"
                               value="{{ old(
                                   'qualification',
                                   $teacher->qualification
                               ) }}"
                               placeholder="Example: M.Tech, M.Sc">

                        @error('qualification')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Designation --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Designation
                        </label>

                        <input type="text"
                               name="designation"
                               class="form-control @error('designation') is-invalid @enderror"
                               value="{{ old(
                                   'designation',
                                   $teacher->designation
                               ) }}"
                               placeholder="Example: Assistant Professor">

                        @error('designation')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Joining Date --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Joining Date
                        </label>

                        <input type="date"
                               name="joining_date"
                               class="form-control @error('joining_date') is-invalid @enderror"
                               value="{{ old(
                                   'joining_date',
                                   optional($teacher->joining_date)
                                   ->format('Y-m-d')
                               ) }}">

                        @error('joining_date')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status"
                                class="form-select @error('status') is-invalid @enderror">

                            <option value="1"
                                {{ old(
                                    'status',
                                    $teacher->status
                                ) == 1 ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="0"
                                {{ old(
                                    'status',
                                    $teacher->status
                                ) == 0 ? 'selected' : '' }}>

                                Inactive

                            </option>

                        </select>

                        @error('status')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Address --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Address
                        </label>

                        <textarea name="address"
                                  rows="3"
                                  class="form-control @error('address') is-invalid @enderror"
                                  placeholder="Enter teacher address">{{ old(
                                      'address',
                                      $teacher->address
                                  ) }}</textarea>

                        @error('address')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Photo --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Teacher Photo
                        </label>

                        <input type="file"
                               name="photo"
                               id="photo"
                               class="form-control @error('photo') is-invalid @enderror"
                               accept="image/jpeg,image/png,image/jpg">

                        <small class="text-muted">
                            JPG, JPEG or PNG. Maximum 2MB.
                        </small>

                        @error('photo')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Current Photo --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold d-block">
                            Current Photo
                        </label>

                        @if($teacher->photo)

                            <img src="{{ asset(
                                'storage/' . $teacher->photo
                            ) }}"
                                 alt="Teacher Photo"
                                 class="img-thumbnail"
                                 style="
                                    width:150px;
                                    height:150px;
                                    object-fit:cover;
                                 ">

                        @else

                            <div class="border rounded p-4 text-muted">
                                No photo uploaded.
                            </div>

                        @endif

                    </div>


                    {{-- New Photo Preview --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold d-block">
                            New Photo Preview
                        </label>

                        <img id="photoPreview"
                             src="#"
                             alt="Preview"
                             class="img-thumbnail d-none"
                             style="
                                width:150px;
                                height:150px;
                                object-fit:cover;
                             ">

                    </div>


                </div>


                {{-- Buttons --}}
                <div class="d-flex flex-column
                            flex-sm-row gap-2
                            mt-4 pt-3 border-top">

                    <button type="submit"
                            class="btn btn-primary">

                        Update Teacher

                    </button>

                    <a href="{{ route(
                        'admin.teachers.index'
                    ) }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- Photo Preview JavaScript --}}
<script>

document.getElementById('photo').addEventListener('change', function(event) {

    const file = event.target.files[0];

    const preview = document.getElementById('photoPreview');

    if (file) {

        preview.src = URL.createObjectURL(file);

        preview.classList.remove('d-none');

    } else {

        preview.src = '#';

        preview.classList.add('d-none');

    }

});

</script>

@endsection