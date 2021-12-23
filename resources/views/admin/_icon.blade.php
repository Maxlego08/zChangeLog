<div class="card shadow mb-4">
    <div class="card-header">
        {{ trans('zchangelog::admin.icon') }}
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('zchangelog.admin.icon') }}" id="changelog-form">

            @csrf

            <div class="row">
                @foreach(['info', 'success', 'danger', 'warning'] as $level)
                    <div class="col-6">
                        <div class="form-group">
                            <label for="{{ $level }}Input"
                                   class="text-{{ $level }} text-capitalize">{{ $level }}</label>
                            <input type="text" class="form-control @error($level) is-invalid @enderror"
                                   id="{{ $level }}Input"
                                   name="{{ $level }}"
                                   value="{{ old($level, setting($prefix . $level, $defaultSettings[$level])) }}"
                                   required>

                            @error($level)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>


            <button class="btn btn-success">{{ trans('messages.actions.save') }}</button>

        </form>
    </div>
</div>
