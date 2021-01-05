<form action="{{ route('back.parameters.update-key-value-pairs') }}">

    @foreach($current_group as $parameter )

        <div class="form-group">
            <label>{{ $parameter->name }}</label>
            <input type="text" class="form-control" name="{{ $parameter->reference }}"
                   value="{{ $parameter->value }}">
        </div>

    @endforeach

    <div class="form-actions">
        <a href="#" class="btn blue update-parameters">{{ __('og.button.save') }}</a>
        <button type="button" class="btn default">Cancel</button>
    </div>

</form>
