<div class="form-group">
    <label for="nameInput">{{ trans('messages.fields.name') }}</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput"
           name="name" value="{{ old('name', $changelog->name ?? '') }}" required>

    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="nameInput">{{ trans('messages.fields.author') }}</label>
    <input type="text" class="form-control @error('author') is-invalid @enderror" id="nameInput"
           name="name" value="{{ old('author', $changelog->author ?? '') }}" required>

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

<ol class="list-unstyled sortable sortable-list mb-2" id="sortable">
    {{ dd(session()->getOldInput()) }}
    @foreach(old('changelog[]', $updates ?? []) as $value)
        <li class="sortable-item" data-id="{{ $value->order }}">
            <div class="card">
                <div class="card-body row">
                    <div class="form-group col-2">
                        <label
                            for="selectInput{{ $value->order }}">{{ trans('zchangelog::admin.fields.level') }}</label>
                        <select class="form-control" id="selectInput{{ $value->order }}" name="changelog[1][level]">
                            @foreach(['info', 'success', 'danger', 'warning'] as $level)
                                <option value="info" @if($value->level == $level) selected @endif
                                class="text-{{ $level }}">{{ trans('zchangelog::admin.levels.' . $level) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-9">
                        <label
                            for="changeLogDescriptionInput{{ $value->order }}">{{ trans('messages.fields.description') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="changeLogDescriptionInput{{ $value->order }}" value="{{ $value->description }}"
                               name="changelog[1][description]" required>
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
