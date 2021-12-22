@extends('admin.layouts.admin')

@section('title', trans('zchangelog::admin.create'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{ route('zchangelog.admin.store') }}">

                @csrf

                <button class="btn btn-success">{{ trans('messages.actions.save') }}</button>

            </form>
        </div>
    </div>
@endsection
