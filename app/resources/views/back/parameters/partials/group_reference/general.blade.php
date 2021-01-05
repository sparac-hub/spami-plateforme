<?php $general_group = $current_group->keyBy('reference') ?>


<form action="{{ route('back.parameters.update-key-value-pairs') }}">

    <div class="form-group">
        <label>Website name</label>
        <input type="text" class="form-control" name="website_name"
               value="{{ $general_group['website_name']['value'] }}">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description"
                  rows="3">{{ $general_group['description']['value'] }}</textarea>
    </div>

    <div class="form-actions">
        <a href="#" class="btn blue update-parameters">{{ __('og.button.save') }}</a>
        <button type="button" class="btn default">Cancel</button>
    </div>

</form>
