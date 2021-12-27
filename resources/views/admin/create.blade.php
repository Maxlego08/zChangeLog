@extends('admin.layouts.admin')

@section('title', trans('zchangelog::admin.create'))

@push('footer-scripts')
    @include('zchangelog::admin._script')
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{ route('zchangelog.admin.store') }}" id="changelog-form">

                @csrf

                @include('zchangelog::admin._form')

                <hr>

                <button class="btn btn-success">{{ trans('messages.actions.save') }}</button>

            </form>
        </div>
    </div>
@endsection
