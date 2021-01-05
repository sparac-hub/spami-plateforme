<form action="{{ route('back.parameters.update-key-value-pairs') }}">

    @foreach($current_group as $parameter )

        @if($parameter->reference == 'backend_theme')
            <?php
            $theme_names = [
                'default',
                'darkblue',
                'blue',
                'grey',
                'light',
                'light2',
            ];
            ?>
            <div class="form-group">
                <label>{{ $parameter->name }}</label>
                <select class="form-control" name="{{$parameter->reference}}">
                    @foreach($theme_names as $theme_name)
                        <option value="{{$theme_name}}" @if($theme_name == $parameter->value){{'selected'}}@endif>{{ ucfirst($theme_name) }}</option>
                    @endforeach
                </select>
            </div>
        @else
            <div class="form-group">
                <label>{{ $parameter->name }}</label>
                <input type="text" class="form-control demo minicolors-input" name="{{ $parameter->reference }}"
                       value="{{ $parameter->value }}">
            </div>
        @endif

    @endforeach

    <div class="form-actions">
        <a href="#" class="btn blue update-parameters">{{ __('og.button.save') }}</a>
        <button type="button" class="btn default">Cancel</button>
    </div>

</form>
