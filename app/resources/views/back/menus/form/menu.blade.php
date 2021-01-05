<div class="form-group">
    <label>{{__('og.menus.menu_id')}} *</label>
    <select class="form-control" name="menu_id">
        <option value=""></option>
        @foreach(App\Models\Cms\Menu::whereIsActive(true)->get() as $menu_)
            <option value="{{ $menu_->id }}"
                    {{ old('menu_id', isset($menu)?$menu->menu_id:'') == $menu_->id ? 'selected':'' }}>
                {{ $menu_->label }}
            </option>
        @endforeach
    </select>
</div>
