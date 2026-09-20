
@extends('layouts.admin')

@section('title', 'Add Teacher')

@section('content')

<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                gap-2 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Add Teacher
            </h2>

            <p class="text-muted mb-0">
                Add a new teacher to the college
            </p>
        </div>

        <a href="{{ route('admin.teachers.index') }}"
           class="btn btn-secondary">
            ← Back to Teachers
        </a>
    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>

    @endif


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Teacher Form Card --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Teacher Information
            </h5>

        </div>


        <div class="card-body p-4">

            <form action="{{ route('admin.teachers.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <div class="row g-3">


                    {{-- Teacher User --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Teacher User
                            <span class="text-danger">*</span>
                        </label>

                        <select name="user_id"
                                class="form-select @error('user_id') is-invalid @enderror">

                            <option value="">
                                -- Select Teacher User --
                            </option>

                            @foreach($users as $user)

                                <option value="{{ $user->id }}"
                                    {{ old('user_id') == $user->id ? 'selected' : '' }}>

                                    {{ $user->name }} - {{ $user->email }}

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
                            <span class="text-danger">*</span>
                        </label>

                        <select name="department_id"
                                class="form-select @error('department_id') is-invalid @enderror">

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

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Employee ID --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Employee ID
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="employee_id"
                               class="form-control @error('employee_id') is-invalid @enderror"
                               value="{{ old('employee_id') }}"
                               placeholder="EMP001">

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
                               value="{{ old('phone') }}"
                               placeholder="9876543210"
                               maxlength="15">

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
                               value="{{ old('qualification') }}"
                               placeholder="M.Tech / MCA / PhD">

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
                               value="{{ old('designation') }}"
                               placeholder="Assistant Professor">

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
                               value="{{ old('joining_date') }}">

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
                            <span class="text-danger">*</span>
                        </label>

                        <select name="status"
                                class="form-select @error('status') is-invalid @enderror">

                            <option value="1"
                                {{ old('status', '1') == '1' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0"
                                {{ old('status') === '0' ? 'selected' : '' }}>
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
                                  placeholder="Enter teacher address">{{ old('address') }}</textarea>

                        @error('address')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Teacher Photo --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Teacher Photo
                        </label>

                        <input type="file"
                               name="photo"
                               id="photo"
                               class="form-control @error('photo') is-invalid @enderror"
                               accept="image/jpeg,image/png,image/jpg">

                        <div class="form-text">
                            JPG, JPEG, PNG | Maximum 2MB
                        </div>

                        @error('photo')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Photo Preview --}}
                    <div class="col-12 col-md-6">

                        <label class="form-label fw-semibold">
                            Photo Preview
                        </label>

                        <div>

                            <img id="photoPreview"
                                 src=""
                                 alt="Photo Preview"
                                 class="img-thumbnail d-none"
                                 width="150"
                                 height="150"
                                 style="object-fit: cover;">

                        </div>

                    </div>

                </div>


                {{-- Buttons --}}
                <div class="mt-4 pt-3 border-top">

                    <button type="submit"
                            class="btn btn-success">

                        💾 Save Teacher

                    </button>

                    <a href="{{ route('admin.teachers.index') }}"
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

document.addEventListener('DOMContentLoaded', function () {

    const photoInput = document.getElementById('photo');
    const photoPreview = document.getElementById('photoPreview');

    photoInput.addEventListener('change', function (event) {

        const file = event.target.files[0];

        if (!file) {

            photoPreview.src = '';
            photoPreview.classList.add('d-none');

            return;
        }


        // Check file type
        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/jpg'
        ];

        if (!allowedTypes.includes(file.type)) {

            alert('Please select JPG, JPEG or PNG image.');

            photoInput.value = '';

            photoPreview.src = '';
            photoPreview.classList.add('d-none');

            return;
        }


        // Check file size - 2MB
        if (file.size > 2 * 1024 * 1024) {

            alert('Photo size must be less than 2MB.');

            photoInput.value = '';

            photoPreview.src = '';
            photoPreview.classList.add('d-none');

            return;
        }


        // Show preview
        photoPreview.src = URL.createObjectURL(file);

        photoPreview.classList.remove('d-none');

    });

});

</script>

@endsection
