@extends('layouts.admin')

@section('title', 'Notices')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Notices</h2>

        <a href="{{ route('admin.notices.create') }}"
           class="btn btn-primary">

            + Add Notice

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="table-responsive">

        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Publish Date</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($notices as $notice)

                    <tr>

                        <td>
                            {{ $notice->id }}
                        </td>

                        <td>
                            {{ $notice->title }}
                        </td>

                        <td>
                            {{ $notice->description }}
                        </td>

                        <td>
                            {{ $notice->publish_date?->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ $notice->expiry_date?->format('d-m-Y') ?? '-' }}
                        </td>

                        <td>

                            @if($notice->status)

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.notices.edit', $notice) }}"
                               class="btn btn-sm btn-warning">

                                Edit

                            </a>


                            <form action="{{ route('admin.notices.destroy', $notice) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this notice?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center">

                            No notices found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection