<div class="form-group">
    <label for="nameInput">{{ trans('messages.fields.name') }}</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput"
           name="name" value="{{ old('name', $changelog->name ?? '') }}" required>

    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="authorInput">{{ trans('messages.fields.author') }}</label>
    <input type="text" class="form-control @error('author') is-invalid @enderror" id="authorInput"
           name="author" value="{{ old('author', $changelog->author ?? '') }}" required>

    @error('author')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="descriptionInput">{{ trans('messages.fields.description') }}</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="descriptionInput" name="description"
              rows="3">{{ old('description', $changelog->description ?? '') }}</textarea>

    @error('description')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<!-- [['order' => 1, 'level' => 'danger', 'description' => 'dd']] -->
<ol class="list-unstyled sortable sortable-list mb-2" id="sortable">
    @foreach(old('changelog', $updates ?? []) as $key => $value)
        <li class="sortable-item" data-id="{{ $value['order'] ?? $key }}">
            <div class="card">
                <div class="card-body row">
                    <div class="form-group col-2">
                        <label
                            for="selectInput{{ $value['order'] ?? $key }}">{{ trans('zchangelog::admin.fields.level') }}</label>
                        <select class="form-control @error('changelog[' . ($value['order'] ?? $key) . '][level]') is-invalid @enderror" id="selectInput{{ $value['order'] ?? $key }}"
                                name="changelog[{index}][level]">
                            @foreach(['info', 'success', 'danger', 'warning'] as $level)
                                <option value="info" @if($value['level'] == $level) selected @endif
                                class="text-{{ $level }}">{{ trans('zchangelog::admin.levels.' . $level) }}</option>
                            @endforeach
                        </select>
                        @error('changelog[' . ($value['order'] ?? $key) . '][level]')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group col-9">
                        <label
                            for="changeLogDescriptionInput{{ $value['order'] ?? $key }}">{{ trans('messages.fields.description') }}</label>
                        <input type="text" class="form-control @error('changelog[' . ($value['order'] ?? $key) . '][description]') is-invalid @enderror"
                               id="changeLogDescriptionInput{{ $value['order'] ?? $key }}"
                               value="{{ $value['description'] }}"
                               name="changelog[{index}][description]" required>
                        @error('changelog[' . ($value['order'] ?? $key) . '][description]')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group col-1" style="margin-top: 30px">
                        <span class="btn btn-danger"
                              onclick="deleteElement(this)">{{ trans('messages.actions.delete') }}</span>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ol>

<span id="addChangeLog" class="btn btn-success">{{ trans('messages.actions.add') }}</span>
