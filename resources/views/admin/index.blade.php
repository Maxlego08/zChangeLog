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
                    @foreach($changelogs as $changelog)
                        <tr>
                            <th>{{ $changelog->id }}</th>
                            <th>{{ $changelog->name }}</th>
                            <th>{{ $changelog->author }}</th>
                            <th>{{ \Illuminate\Support\Str::limit($changelog->description, 25) }}</th>
                            <th>{{ format_date($changelog->created_at) }}</th>
                            <th>
                                <a href="{{ route('zchangelog.admin.edit', $changelog) }}" class="m-1" title="{{ trans('messages.actions.edit') }}" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('zchangelog.admin.destroy', $changelog) }}" class="m-1" title="{{ trans('messages.actions.delete') }}" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('zchangelog.admin.create') }}"
               class="btn btn-success">{{ trans('messages.actions.add') }}</a>
        </div>
    </div>

    @include('zchangelog::admin._icon')
@endsection
