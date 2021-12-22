@extends('admin.layouts.admin')

@section('title', trans('zchangelog::admin.create'))

@push('footer-scripts')
    <script src="{{ asset('vendor/sortablejs/Sortable.min.js') }}"></script>
    <script>
        const sortable = document.getElementById('sortable');

        document.querySelectorAll('.sortable-list').forEach(function (el) {
            Sortable.create(el, {
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                group: {
                    name: 'navbar',
                    put: function (to, sortable, drag) {
                        return !drag.classList.contains('sortable-parent');
                    },
                },
            });
        });

        function serialize(sortable) {
            return [].slice.call(sortable.children).map(function (child) {
                const nested = child.querySelector('.sortable');

                return {
                    id: child.dataset['id'],
                    children: nested ? serialize(nested) : [],
                };
            });
        }

        function deleteElement(element) {
            const parentElement = element.parentNode.parentNode.parentNode.parentNode;
            parentElement.parentNode.removeChild(parentElement);
        }

        let order = 1;

        window.addEventListener('load', () => {

            document.querySelectorAll('.sortable-item').forEach(element => order = Math.max(parseInt(element.getAttribute('data-id')), order));
            order = order + 1;

            document.getElementById('addChangeLog').addEventListener('click', function () {
                let input = '';
                input += '<div class="card">';
                input += '<div class="card-body row">';
                input += '<div class="form-group col-2">';
                input += `<label for="selectInput${order}">{{ trans('zchangelog::admin.fields.level') }}</label>`;
                input += `<select class="form-control" id="selectInput${order}" name="changelog[${order}][level]">`;
                input += '<option value="1" class="text-info">{{ trans('zchangelog::admin.levels.info') }}</option><option value="2" class="text-success">{{ trans('zchangelog::admin.levels.success') }}</option><option value="3" class="text-danger">{{ trans('zchangelog::admin.levels.danger') }}</option><option value="4" class="text-warning">{{ trans('zchangelog::admin.levels.warning') }}</option>';
                input += '</select></div><div class="form-group col-9">';
                input += `<label for="changeLogDescriptionInput${order}">{{ trans('messages.fields.description') }}</label>`;
                input += `<input type="text" class="form-control @error('name') is-invalid @enderror" id="changeLogDescriptionInput${order}" name="changelog[${order}][description]" required>`;
                input += '</div><div class="form-group col-1" style="margin-top: 30px">';
                input += '<span class="btn btn-danger" onclick="deleteElement(this)">{{ trans('messages.actions.delete') }}</span>';
                input += '</div>';
                input += '</div>';
                input += '</div>';

                const newElement = document.createElement('li');
                newElement.classList.add('sortable-item');
                newElement.setAttribute('data-id', order);
                newElement.innerHTML = input;
                sortable.append(newElement);
            });
        });
    </script>
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
