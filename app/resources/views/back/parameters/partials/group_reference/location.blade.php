<?php $general_group = $current_group->keyBy('reference') ?>

<form action="{{ route('back.parameters.update-key-value-pairs') }}">

    <div id="map"></div>
    <br>
    <a id="confirmPosition" class="btn blue btn-outline">Confirm Position</a> {{-- TODO: Translate --}}
    <br>
    <br>

    <div class="form-group">
        <label>Longitude</label>
        <input type="text" class="form-control" name="map_lng"
               value="{{ $general_group['map_lng']['value'] }}">
    </div>

    <div class="form-group">
        <label>Latitude</label>
        <input type="text" class="form-control" name="map_lat"
               value="{{ $general_group['map_lat']['value'] }}">
    </div>

    <div class="form-group">
        <label>Map image</label>
        <input type="text" class="form-control" name="map_image"
               value="{{ $general_group['map_image']['value'] }}">
    </div>

    <div class="form-actions">
        <a href="#" class="btn blue update-parameters">{{ __('og.button.save') }}</a>
        <button type="button" class="btn default">Cancel</button>
    </div>

</form>
