<div class="row">
    <div class="form-group">
        <div class="col-sm-10 col-md-10 col-lg-10">
            <label>{{__('og.menus.internal_link')}} *</label>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <label>{{__('og.menus.link_target')}} *</label>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            {{ env('APP_URL') }}
        </div>
        <div class="col-sm-7 col-md-7 col-lg-7">
            <input type="text" class="form-control is-not-module"
                   value="{{ old($locale.'.internal_link', isset($banner)?$banner->translateOrNew($locale)->internal_link:'') }}"
                   placeholder="/fr/suite_du_lien"
                   name="{{$locale}}[internal_link]">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <select class="form-control" name="{{$locale}}[link_target]">
                <option value="">-- Cible --</option>
                @foreach(config('cms.link_targets') as $link_target_value => $link_target_label)
                    <option value="{{ $link_target_value }}"
                        {{ old($locale.'.link_target', isset($banner)?$banner->translateOrNew($locale)->link_target:'') == $link_target_value ? 'selected':'' }}>
                        {{ $link_target_label }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
