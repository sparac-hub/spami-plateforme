<div class="form-group">
    <label>{{__('og.menus.module_id')}} *</label>
    <select class="form-control" name="module_id" required>
        <option value=""></option>
        @foreach(App\Models\Cms\Module::where('is_menu_module', 1)->get() as $module)
            <option value="{{ $module->id }}"
                    {{ old('module_id', isset($menu)?$menu->module_id:'') == $module->id ? 'selected':'' }}>
                {{ $module->name }}
            </option>
        @endforeach
    </select>
</div>
