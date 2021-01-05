<div class="form-group">
    <label>{{__('og.menus.menu_id')}} *</label>
    <select class="form-control" name="menu_id">
        <option value=""></option>
        @foreach(App\Models\Cms\Menu::whereIsActive(true)->get() as $menu)
            <option value="{{ $menu->id }}"
                {{ old($locale.'.menu_id', isset($banner)?$banner->translateOrNew($locale)->menu_id:'') == $menu->id ? 'selected':'' }}>
                {{ $menu->label }}
            </option>
        @endforeach
    </select>
</div>
