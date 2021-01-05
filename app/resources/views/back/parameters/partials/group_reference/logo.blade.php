@php
    $general_group = $current_group->keyBy('reference');
@endphp

<form action="{{ route('back.parameters.update-key-value-pairs') }}">

    <div class="form-group">
        <label>Main logo </label>
        <div class="input-group">
           <span class="input-group-btn">
             <a id="lfm-image-btn" data-input="lfm-image-thumbnail" data-preview="holder" class="btn btn-primary">
               <i class="fa fa-picture-o"></i> {{__('og.banners.image_filepath')}}
             </a>
           </span>
            <input id="lfm-image-thumbnail" class="form-control" type="text" name="main_logo"
                   value="{{ $general_group['main_logo']['value'] }}">
        </div>

        <div id="lfm-image">
            <img src="{{ $general_group['main_logo']['value'] }}" style="margin:15px 10px 15px 10px;max-height:100px;">
        </div>
    </div>

    <div class="form-group">
        <label>Mobile logo </label>
        <div class="input-group">
           <span class="input-group-btn">
             <a id="lfm-image-btn-mobile" data-input="lfm-image-thumbnail-mobile" data-preview="holder"
                class="btn btn-primary">
               <i class="fa fa-picture-o"></i> {{__('og.banners.image_filepath')}}
             </a>
           </span>
            <input id="lfm-image-thumbnail-mobile" class="form-control" type="text" name="mobile_logo"
                   value="{{ $general_group['mobile_logo']['value'] }}">
        </div>

        <div class="lfm-image">
            <img src="{{ $general_group['mobile_logo']['value'] }}"
                 style="margin:15px 10px 15px 10px;max-height:100px;">
        </div>
    </div>

    <div class="form-group">
        <label>Footer logo </label>
        <div class="input-group"><span class="input-group-btn">
             <a id="lfm-image-btn-footer" data-input="lfm-image-thumbnail-footer" data-preview="holder"
                class="btn btn-primary">
               <i class="fa fa-picture-o"></i> {{__('og.banners.image_filepath')}}
             </a>
           </span>
            <input id="lfm-image-thumbnail-footer" class="form-control" type="text" name="footer_logo"
                   value="{{ $general_group['footer_logo']['value'] }}">
        </div>

        <div class="lfm-image">
            <img src="{{ $general_group['footer_logo']['value'] }}"
                 style="margin:15px 10px 15px 10px;max-height:100px;">
        </div>
    </div>

    <div class="form-group">
        <label>Other Logo </label>
        <div class="input-group">
           <span class="input-group-btn">
             <a id="lfm-image-btn-other" data-input="lfm-image-thumbnail-other" data-preview="holder"
                class="btn btn-primary">
               <i class="fa fa-picture-o"></i> {{__('og.banners.image_filepath')}}
             </a>
           </span>
            <input id="lfm-image-thumbnail-other" class="form-control" type="text" name="other_logo"
                   value="{{ $general_group['other_logo']['value'] }}">
        </div>

        <div class="lfm-image">
            <img src="{{ $general_group['other_logo']['value'] }}" style="margin:15px 10px 15px 10px;max-height:100px;">
        </div>
    </div>

    <div class="form-actions">
        <a href="#" class="btn blue update-parameters">{{ __('og.button.save') }}</a>
        <button type="button" class="btn default">Cancel</button>
    </div>

</form>
