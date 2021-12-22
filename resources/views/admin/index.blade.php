@extends('admin.layouts.admin')

@section('title', trans('zchangelog::admin.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.name') }}</th>
                        <th scope="col">{{ trans('messages.fields.author') }}</th>
                        <th scope="col">{{ trans('messages.fields.description') }}</th>
                        <th scope="col">{{ trans('messages.fields.date') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>



                    </tbody>
                </table>
            </div>
            <a href="{{ route('zchangelog.admin.create') }}" class="btn btn-success">{{ trans('messages.actions.add') }}</a>
        </div>
    </div>
@endsection
