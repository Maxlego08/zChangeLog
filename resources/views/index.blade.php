@extends('layouts.app')

@section('title', trans('zchangelog::messages.title'))

@section('content')
    <div class="container content">

        <h2 class="text-center mb-5">{{ trans('zchangelog::messages.title') }}</h2>

        @foreach($changelogs as $changelog)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span>{{ $changelog->author }}</span>
                        <span>{{ format_date($changelog->created_at) }}</span>
                    </div>
                    @if(isset($changelog->description))
                        <hr>
                        <p>
                            {{ $changelog->description }}
                        </p>
                    @endif
                    @if($changelog->updates->count() > 0)
                        <table class="table">
                            <tbody>
                            @foreach($changelog->updates->sortByDesc('order') as $update)
                                <tr>
                                    <th style="width: 50px" class="text-{{ $update->level }}">{{ $update->icon() }}</th>
                                    <th>{{ $update->description }}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        @endforeach
        {{ $changelogs->links() }}
    </div>
@endsection
