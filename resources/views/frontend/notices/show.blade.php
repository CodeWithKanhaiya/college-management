@extends('layouts.admin')

@section('title', 'Notice Details')

@section('content')

<div class="container-fluid py-4">

    <div class="row justify-content-center">

        <div class="col-12 col-lg-9">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    {{-- Title --}}
                    <h1 class="fw-bold mb-3">
                        {{ $notice->title }}
                    </h1>

                    {{-- Publish Date --}}
                    <div class="text-muted mb-4">
                        📅 Published:
                        {{ optional($notice->publish_date)->format('d M Y') }}
                    </div>

                    <hr>

                    {{-- Description --}}
                    <div class="mt-4">

                        {!! nl2br(e($notice->description)) !!}

                    </div>

                    {{-- Back Button --}}
                    <div class="mt-4">

                        <a href="{{ route('notices.index') }}"
                           class="btn btn-secondary">

                            ← Back to Notices

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection