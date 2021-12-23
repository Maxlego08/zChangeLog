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

    function deleteElement(element) {
        const parentElement = element.parentNode.parentNode.parentNode.parentNode;
        parentElement.parentNode.removeChild(parentElement);
    }

    let order = 0;

    window.addEventListener('load', () => {

        document.querySelectorAll('.sortable-item').forEach(element => order = Math.max(parseInt(element.getAttribute('data-id')), order));
        order = order + 1;

        document.getElementById('addChangeLog').addEventListener('click', function () {
            let input = '';
            input += '<div class="card">';
            input += '<div class="card-body row">';
            input += '<div class="form-group col-2">';
            input += `<label for="selectInput${order}">{{ trans('zchangelog::admin.fields.level') }}</label>`;
            input += `<select class="form-control" id="selectInput${order}" name="changelog[{index}][level]">`;
            input += '<option value="info" class="text-info">{{ trans('zchangelog::admin.levels.info') }}</option><option value="success" class="text-success">{{ trans('zchangelog::admin.levels.success') }}</option><option value="danger" class="text-danger">{{ trans('zchangelog::admin.levels.danger') }}</option><option value="warning" class="text-warning">{{ trans('zchangelog::admin.levels.warning') }}</option>';
            input += '</select></div><div class="form-group col-9">';
            input += `<label for="changeLogDescriptionInput${order}">{{ trans('messages.fields.description') }}</label>`;
            input += `<input type="text" class="form-control @error('name') is-invalid @enderror" id="changeLogDescriptionInput${order}" name="changelog[{index}][description]" required>`;
            input += '</div><div class="form-group col-1" style="margin-top: 30px">';
            input += '<span class="btn btn-danger" onclick="deleteElement(this)">{{ trans('messages.actions.delete') }}</span>';
            input += '</div>';
            input += '</div>';
            input += '</div>';

            order += 1;

            const newElement = document.createElement('li');
            newElement.classList.add('sortable-item');
            newElement.setAttribute('data-id', order);
            newElement.innerHTML = input;
            sortable.append(newElement);
        });

        document.getElementById('changelog-form').addEventListener('submit', () => {
            console.log("ici");
            let i = 0;
            sortable.querySelectorAll('.card-body').forEach(function (el) {
                el.querySelectorAll('.form-control').forEach(input => input.name = input.name.replace('{index}', i.toString()));
                i++;
            });
        });
    });
</script>
