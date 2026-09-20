@extends('layouts.admin')

@section('title', 'Add Notice')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">Add Notice</h2>

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

        <div class="card-body">

            <form action="{{ route('admin.notices.store') }}"
                  method="POST">

                @csrf


                <div class="mb-3">

                    <label class="form-label">
                        Notice Title
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea name="description"
                              class="form-control"
                              rows="5"
                              required>{{ old('description') }}</textarea>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Publish Date
                    </label>

                    <input type="date"
                           name="publish_date"
                           class="form-control"
                           value="{{ old('publish_date', date('Y-m-d')) }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Expiry Date
                    </label>

                    <input type="date"
                           name="expiry_date"
                           class="form-control"
                           value="{{ old('expiry_date') }}">

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select"
                            required>

                        <option value="1">
                            Active
                        </option>

                        <option value="0">
                            Inactive
                        </option>

                    </select>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Save Notice

                </button>


                <a href="{{ route('admin.notices.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

@endsection