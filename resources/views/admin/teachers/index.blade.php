
@extends('layouts.admin')

@section('title', 'Teachers')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Teacher List
            </h2>

            <p class="text-muted mb-0">
                Manage all college teachers
            </p>
        </div>

        <a href="{{ route('admin.teachers.create') }}"
           class="btn btn-primary">

            + Add Teacher

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


    {{-- Error Message --}}
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Teacher Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                All Teachers
            </h5>

        </div>


        <div class="card-body">

            {{-- Responsive Table --}}
            <div class="table-responsive">

                <table class="table table-bordered
                              table-striped
                              table-hover
                              align-middle
                              mb-0">

                    <thead class="table-dark">

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Photo
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Employee ID
                            </th>

                            <th>
                                Department
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Qualification
                            </th>

                            <th>
                                Designation
                            </th>

                            <th>
                                Joining Date
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($teachers as $teacher)

                            <tr>

                                {{-- ID --}}
                                <td>
                                    {{ $teacher->id }}
                                </td>


                                {{-- Photo --}}
                                <td>

                                    @if($teacher->photo)

                                        <img src="{{ asset(
                                            'storage/' . $teacher->photo
                                        ) }}"
                                             alt="Teacher Photo"
                                             class="rounded-circle"
                                             width="55"
                                             height="55"
                                             style="
                                                object-fit:cover;
                                             ">

                                    @else

                                        <div class="bg-light
                                                    rounded-circle
                                                    d-flex
                                                    align-items-center
                                                    justify-content-center"
                                             style="
                                                width:55px;
                                                height:55px;
                                             ">

                                            👨‍🏫

                                        </div>

                                    @endif

                                </td>


                                {{-- Name --}}
                                <td>

                                    <strong>
                                        {{ $teacher->user->name ?? 'N/A' }}
                                    </strong>

                                </td>


                                {{-- Employee ID --}}
                                <td>

                                    {{ $teacher->employee_id ?? 'N/A' }}

                                </td>


                                {{-- Department --}}
                                <td>

                                    {{ $teacher->department->name ?? 'N/A' }}

                                </td>


                                {{-- Phone --}}
                                <td>

                                    {{ $teacher->phone ?? 'N/A' }}

                                </td>


                                {{-- Qualification --}}
                                <td>

                                    {{ $teacher->qualification ?? 'N/A' }}

                                </td>


                                {{-- Designation --}}
                                <td>

                                    {{ $teacher->designation ?? 'N/A' }}

                                </td>


                                {{-- Joining Date --}}
                                <td>

                                    @if($teacher->joining_date)

                                        {{ \Carbon\Carbon::parse(
                                            $teacher->joining_date
                                        )->format('d-m-Y') }}

                                    @else

                                        N/A

                                    @endif

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($teacher->status)

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td>

                                    <div class="d-flex gap-1">

                                        {{-- View --}}
                                        <a href="{{ route(
                                            'admin.teachers.show',
                                            $teacher->id
                                        ) }}"
                                           class="btn btn-info btn-sm">

                                            View

                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route(
                                            'admin.teachers.edit',
                                            $teacher->id
                                        ) }}"
                                           class="btn btn-warning btn-sm">

                                            Edit

                                        </a>


                                        {{-- Delete --}}
                                        <form action="{{ route(
                                            'admin.teachers.destroy',
                                            $teacher->id
                                        ) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm(
                                                        'Are you sure you want to delete this teacher?'
                                                    )">

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="11"
                                    class="text-center py-4">

                                    <div class="text-muted">

                                        No teachers found.

                                    </div>

                                    <a href="{{ route(
                                        'admin.teachers.create'
                                    ) }}"
                                       class="btn btn-primary btn-sm mt-2">

                                        Add First Teacher

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

@endsection
