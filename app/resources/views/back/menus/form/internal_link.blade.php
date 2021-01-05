<div class="row">
    <div class="col-sm-10 col-md-10 col-lg-10">
        <label>{{__('og.menus.internal_link')}} *</label>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
        <label>{{__('og.menus.link_target')}} *</label>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
        {{ env('APP_URL').'/'.locale() }}
    </div>
    <div class="col-sm-7 col-md-7 col-lg-7">
        <input type="text" class="form-control is-not-module" name="internal_link" required
               placeholder="/suite_du_lien"
               value="{{ old('internal_link', isset($menu)?$menu->internal_link:'') }}">
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
        <select class="form-control" name="link_target" required>
            <option value="">-- Cible --</option>
            @foreach(config('cms.link_targets') as $link_target_value => $link_target_label)
                <option value="{{ $link_target_value }}"
                        {{ old('link_target', isset($menu)?$menu->link_target:'') == $link_target_value ? 'selected':'' }}>
                    {{ $link_target_label }}
                </option>
            @endforeach
        </select>
    </div>
</div>
