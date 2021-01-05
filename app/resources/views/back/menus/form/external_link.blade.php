<div class="row">
    <div class="form-group col-sm-2 col-md-2 col-lg-2">
        <label>{{__('og.menus.http_protocol')}} *</label>
        <select class="form-control" name="http_protocol" required>
            <option value="">-- http / https --</option>
            @foreach(config('cms.http_protocols') as $http_protocol)
                <option value="{{ $http_protocol }}"
                        {{ old('http_protocol', isset($menu)?$menu->http_protocol:'') == $http_protocol ? 'selected':'' }}>
                    {{ $http_protocol }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-sm-7 col-md-7 col-lg-7">
        <label>{{__('og.menus.external_link')}} *</label>
        <input type="text" class="form-control is-not-module" name="external_link" required
               value="{{ old('external_link', isset($menu)?$menu->external_link:'') }}">
    </div>

    <div class="form-group col-sm-3 col-md-3 col-lg-3">
        <label>{{__('og.menus.link_target')}} *</label>
        <select class="form-control" name="link_target" required>
            <option value="">-- Cible --</option>
            @foreach(config('cms.link_targets') as $link_target_value => $link_target_label)
                <option value="{{ $link_target_value }}"
                        {{ old('link_target', isset($menu)?$menu->link_target:'') == $link_target_value ? 'selected':'' }}>
                    {{ $link_target_label }}</option>
            @endforeach
        </select>
    </div>
</div>