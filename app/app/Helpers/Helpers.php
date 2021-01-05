<?php

if (!function_exists('front_show')) {
    function front_show(\App\Models\BaseModel $model): string
    {
        return route('front.routes.show', ['menu_slug' => $model->menu->slug, 'slug' => $model->slug]);
    }
}

if (!function_exists('front_category')) {
    function front_category(\App\Models\BaseModel $model): string
    {
        return route('front.routes.category', ['menu_slug' => $model->menu->slug, 'category_slug' => $model->category->slug]);
    }
}

if (!function_exists('front_dir')) {
    function front_dir(): string
    {
        return config('cms.front_views_folder');
    }
}

if (!function_exists('is_active_html')) {
    function is_active_html($status): string
    {
        $class = 'label-danger';
        $text = __("Inactive");

        if ($status) {
            $class = 'label-success';
            $text = __("Active");
        }

        return '<span class="label ' . $class . '">' . $text . '</span>';
    }
}

if (!function_exists('link_module')) {
    /**
     * @param \App\Models\Cms\Menu $menu
     * @return string
     */
    function link_module(\App\Models\Cms\Menu $menu): string
    {
        if (!isset($menu->module->backend_route)) {
            return '#';
        }

        return '<a href="' . route($menu->module->backend_route, ['menu_id' => $menu->id])
            . '">' . $menu->label . '</a>';
    }
}

if (!function_exists('carbon')) {
    /**
     * @param string $dbDate
     * @return \Carbon\Carbon
     * */
    function carbon($dbDate = null): \Carbon\Carbon
    {
        if ($dbDate) {
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dbDate);
        }
        return new \Carbon\Carbon();
    }
}

if (!function_exists('locale')) {
    function locale(): string
    {
        return app()->getLocale();
    }
}

if (!function_exists('localeForForum')) {
    function localeForForum(): string
    {
        $request = new Illuminate\Http\Request;
        return $request->segment(1) ?? locale();
    }
}

if (!function_exists('route_for_forums')) {
    function route_for_forums($locale): string
    {
        return env('APP_URL') . '/' . $locale . '/forums';
    }
}

/*
if (!function_exists('menu_translations_with_slug')) {
    function menu_translations_with_slug()
    {
        return Illuminate\Support\Facades\Cache::remember(locale() . '_menu_translations_with_slug',
            1440, function () {
                // TODO: Optimize this query (select only useful data and put them in cache)
                // To prevent the following error during installation : Base table or view not found (Empty database)
                if (Schema::hasTable((new App\Models\Cms\MenuTranslation)->getTable())) {
                    $menu_translations_with_slug = \App\Models\Cms\MenuTranslation::whereNotNull('slug')
                        ->where('locale', locale())
                        ->whereHas('menu', function ($q) {
                            $q->whereIsActive(true);
                            //->where('menu_group_id', 1); // Todo: all menus?
                        })
                        ->with([
                            'menu.module' => function ($query) {
                                $query->withTranslation();
                            },
                        ])
                        ->with('menu.menu_group')// Municipality Multiple websites!
                        ->get();
                } else {
                    $menu_translations_with_slug = [];
                }

                return $menu_translations_with_slug;
            });
    }
}
*/

if (!function_exists('menu_translations_with_slug')) {
    function menu_translations_with_slug()
    {
        return Illuminate\Support\Facades\Cache::remember(locale() . '_menu_translations_with_slug',
            1440, function () {
                // TODO: Optimize this query (select only useful data and put them in cache)
                // To prevent the following error during installation : Base table or view not found (Empty database)
                if (Schema::hasTable((new App\Models\Cms\MenuTranslation)->getTable())) {
                    $menu_translations_with_slug = \App\Models\Cms\MenuTranslation::whereNotNull('slug')
                        ->where('locale', locale())
                        ->whereHas('menu', function ($q) {
                            $q->whereIsActive(true);
                            //->where('menu_group_id', 1); // Todo: all menus?
                        })
                        ->with([
                            'menu.module' => function ($query) {
                                $query->withTranslation();
                            },
                        ])
                        ->with('menu.menu_group')// Municipality Multiple websites!
                        ->get();
                } else {
                    $menu_translations_with_slug = [];
                }

                return $menu_translations_with_slug;
            });
    }
}


if (!function_exists('var_export54')) {
    function var_export54($var, $indent = "")
    {
        switch (gettype($var)) {
            case "string":
                return '"' . addcslashes($var, "\\\$\"\r\n\t\v\f") . '"';
            case "array":
                $indexed = array_keys($var) === range(0, count($var) - 1);
                $r = [];
                foreach ($var as $key => $value) {
                    $r[] = "$indent    "
                        . ($indexed ? "" : var_export54($key) . " => ")
                        . var_export54($value, "$indent    ");
                }
                return "[\n" . implode(",\n", $r) . "\n" . $indent . "]";
            case "boolean":
                return $var ? true : false;
            default:
                return var_export($var, true);
        }
    }
}


if (!function_exists('link_route')) {
    function link_route($name, $title = null, $parameters = []): string
    {
        return '<a href="' . route($name, $parameters) . '">' . $title . '</a>';
    }
}

if (!function_exists('link_route')) {
    function link_route($route_name, $str, $id = null): string
    {
        echo '<a href="' . route($route_name, $id) . '">' . $str . '</a>';
    }
}

if (!function_exists('html_select')) {
    /**
     * @param string $model
     * @param string $content_column
     * @param integer|null $selected_id
     * @param string|null $order
     * @param array|null $except array $except[0] : Column name, $except[1] : array of excepted values
     * @return string
     */
    function html_select($model, $content_column, $selected_id = null, $order = null, $except = null)
    {
        $model = "$model";
        $order = $order ?? 'id';
        $data = $model::orderBy($order, 'asc');
        if ($except) {
            $data->whereNotIn($except[0], $except[1]);
        }
        $data = $data->get();
        echo '<option></option>';
        $data->each(function ($item, $key) use ($content_column, $selected_id) {
            $selected = ($selected_id == $item['id']) ? ' selected' : '';
            echo '<option value="' . $item['id'] . '"' . $selected . '> ' . $item[$content_column] . '</option>';
        });
    }
}


if (!function_exists('sidebar_organization_categories')) {
    function sidebar_organization_categories($organization_category_id = null)
    {
        if ($current_organization_category = App\OrganizationCategory::with('organization_category.organization_categories')->find($organization_category_id)) {
            if ($current_organization_category->parent_id) {
                return $current_organization_category
                    ->organization_category
                    ->organization_categories;
            }
        }

        return App\OrganizationCategory::where('parent_id', null)->get();
    }
}


if (!function_exists('pp')) {
    function pp($var, $die = false)
    {
        if ($die) {
            echo '-- start pp() --';
        }
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        if ($die) {
            echo '-- end pp() --';
        }
    }
}


if (!function_exists('set_box_head')) {
    function set_box_head($title, $class): string
    {
        $class = ($class) ? $class : 'portlet green box';
        return
            '
        <div class="' . $class . '">
            <div class="portlet-title">
                <div class="caption">
                    ' . $title . '
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                </div>
            </div>
            <div class="portlet-body">
';
    }
}

if (!function_exists('set_box_head_sitemap')) {
    function set_box_head_sitemap($title, $class): string
    {
        $class = ($class) ? $class : 'portlet green box';
        return
            '
        <div class="' . $class . '">
            <div class="portlet-title">
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                </div>
            </div>
            <div class="portlet-body">
';
    }
}


if (!function_exists('set_box_foot')) {
    function set_box_foot(): string
    {
        return
            '
            </div>
        </div>
';
    }
}

/**
 * Shortens a string in a pretty way. It will clean it by trimming
 * it, remove all double spaces and html. If the string is then still
 * longer than the specified $length it will be shortened. The end
 * of the string is always a full word concatenated with the
 * specified moreTextIndicator.
 *
 * @param string $string
 * @param int $length
 * @param string $moreTextIndicator
 *
 * @return string
 */
function str_tease(string $string, int $length = 200, string $moreTextIndicator = '...'): string
{
    $string = trim($string);

    //remove html
    $string = strip_tags($string);

    //replace multiple spaces
    $string = preg_replace("/\s+/", ' ', $string);

    if (strlen($string) == 0) {
        return '';
    }

    if (strlen($string) <= $length) {
        return $string;
    }

    $ww = wordwrap($string, $length, "\n");

    $string = substr($ww, 0, strpos($ww, "\n")) . $moreTextIndicator;

    return $string;
}

if (!function_exists('truncate_html')) {
    /**
     * Safely truncate content. It takes care of opening/closing html tags.
     * @param $text
     * @param $length
     * @param string $suffix
     * @param bool $isHTML
     * @return mixed|string
     */
    function truncate_html($text, $length, $suffix = '…', $isHTML = true)
    {
        $i = 0;
        $simpleTags = [
            'br' => true,
            'hr' => true,
            'input' => true,
            'image' => true,
            'link' => true,
            'meta' => true,
        ];
        $tags = [];
        if ($isHTML) {
            preg_match_all('/<[^>]+>([^<]*)/', $text, $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
            foreach ($m as $o) {
                if ($o[0][1] - $i >= $length) {
                    break;
                }
                $t = substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
                // test if the tag is unpaired, then we mustn't save them
                if ($t[0] != '/' && (!isset($simpleTags[$t]))) {
                    $tags[] = $t;
                } elseif (end($tags) == substr($t, 1)) {
                    array_pop($tags);
                }
                $i += $o[1][1] - $o[0][1];
            }
        }

        // output without closing tags
        $output = substr($text, 0, $length = min(strlen($text), $length + $i));
        // closing tags
        $output2 = (count($tags = array_reverse($tags)) ? '</' . implode('></', $tags) . '>' : '');

        // Find last space or HTML tag (solving problem with last space in HTML tag eg. <span class="new">)
        $preg_split = preg_split('/<.*>| /', $output, -1, PREG_SPLIT_OFFSET_CAPTURE);
        $end = end($preg_split);
        $pos = (int)end($end);

        // Append closing tags to output
        $output .= $output2;

        // Get everything until last space
        if (isset($end[1]) && $end[1] == 0) { // If it's a single word, just keep it
            $one = $output;
        } else { // else remove the last word
            $one = substr($output, 0, $pos);
        }

        // Get the rest
        $two = substr($output, $pos, (strlen($output) - $pos));
        // Extract all tags from the last bit
        preg_match_all('/<(.*?)>/s', $two, $tags);
        // Add suffix if needed
        if (strlen($text) > $length) {
            $one .= $suffix;
        }
        // Re-attach tags
        $output = $one . implode($tags[0]);

        //added to remove  unnecessary closure
        $output = str_replace('</!-->', '', $output);

        return $output;
    }
}

if (!function_exists('route_for_banner')) {
    function route_for_banner($banner)
    {
        if (isset($banner->link_type_id)) {
            if ($banner->link_type_id == 1) {
                $route_for_banner = route('front.routes.index', ['menu_slug' => $banner->menu->slug]);
                return $route_for_banner;
            }

            if ($banner->link_type_id == 2) {
                $route_for_banner = env('APP_URL') . '' . $banner->internal_link;
                return $route_for_banner;
            }

            if ($banner->link_type_id == 3) {
                $route_for_banner = $banner->http_protocol . '' . $banner->external_link;
                return $route_for_banner;
            }
        }

        return "javascript:";
    }
}

if (!function_exists('routeForMenu')) {
    function routeForMenu($menu)
    {
        if (isset($menu->link_type_id)) {
            if ($menu->link_type_id == 2) {
                $routeForMenu = env('APP_URL') . '' . $menu->internal_link;
                return $routeForMenu;
            } elseif ($menu->link_type_id == 3) {
                $routeForMenu = $menu->http_protocol . '' . $menu->external_link;
                return $routeForMenu;
            }
        }

        return "javascript:";
    }
}

if (!function_exists('widget_element_label')) {
    function widget_element_label($element, $number)
    {
        $label = truncate_html($element['question'], $number);
        $label .= truncate_html($element['name'], $number);
        $label .= truncate_html($element['title'], $number);
        $label .= truncate_html($element['label'], $number);

        return $label;
    }
}

if (!function_exists('get_widget_elements')) {
    function get_widget_elements(\App\Models\Cms\Widget $widget)
    {
        $mainModel = $widget->module->main_model;
        if ($widget->select_type == "free_select") {
            $widget_elements = \App\Models\Cms\WidgetElement::whereWidgetId($widget->id)
                ->orderBy('order')
                ->get();

            $elements = collect([]);

            foreach ($widget_elements as $widget_element) {
                $element = $mainModel::find($widget_element->widget_element_id);
                if ($element) {
                    $elements->push($element);
                } else {
                    $widget_element->delete();
                }
            }

        } else {

            $elements = $mainModel::whereIsActive(true);

            if ($mainModel == 'App\Models\Cms\MediaAlbum') {
                $elements = $elements->withCount(['images', 'videos']);
            }

            $elements = $elements->orderBy($widget->order_column, $widget->order_column_type)
                ->limit($widget->number_for_latest)
                ->get();

        }

        return $elements;
    }
}

if (!function_exists('get_elements_for_show_widget')) {
    function get_elements_for_show_widget($widget)
    {
        $mainModel = $widget->module->main_model;

        // Getting checked main model elements ids from WidgetElement Table
        $data['pluck_elements'] = \App\Models\Cms\WidgetElement::where('widget_id', $widget->id)
            ->get()
            ->pluck('widget_element_id')
            ->toArray();

        //Getting All elements from Main Model
        $data['elements'] = $mainModel::paginate(10);

        return $data;
    }
}

if (!function_exists('get_index_route_from_widget')) {
    function get_index_route_from_widget($widget, $elements)
    {
        $element = $elements->first();

        $mainModel = $widget->module->main_model;

        if ($widget->select_type == "free_select") {
            $element = $mainModel::with('menu')->find($element->widget_element_id);
        }

        return route('front.routes.index', ['menu_slug' => $element->menu->slug]);
    }
}

if (!function_exists('get_locale_from_language')) {
    function set_locale_from_language()
    {
        $environment = App::environment();

        // For windows
        if ($environment == 'local') {
            $tab = [
                'fr' => 'fr_FR.UTF-8',
                'en' => 'en_US.UTF-8',
                'ar' => 'ar_TN.UTF-8',
            ];
        } else {
            // For linux systems
            $tab = [
                'fr' => 'fr_FR.UTF-8',
                'en' => 'en_US.UTF-8',
                'ar' => 'ar_TN.UTF-8',
            ];
        }
        return setlocale(LC_TIME, $tab[locale()]);
    }
}


if (!function_exists('og_tags')) {
    function og_tags($menu = null, $element = null, $hasMedia = false, $isfile = false)
    {
        $image = asset("front/assets/images/png/logo.png");
        if ($element) {

            $image = $element->image;

            if ($hasMedia) {
                if ($media = $element->getFirstMedia($element->id . '/' . locale())) {
                    $image = $media->getFullUrl();
                } elseif ($media = $element->getFirstMedia()) {
                    $image = $media->getFullUrl();
                } else {
                    $image = asset("front/assets/images/png/logo.png");
                }
            }
            if ($isfile) {
                $image = asset("front/assets/images/png/logo.png");
            }

            return [
                'url' => url()->current(),
                'title' => $element->name,
                'type' => 'article',
                'description' => $element->description,
                'image' => $image,
                'site_name' => get_cached_parameters('website_name'),
                'updated_time' => time(),
                'image:alt' => get_cached_parameters('website_name'),
                'locale' => locale(),
            ];
        }

        if ($menu) {
            return [
                'url' => url()->current(),
                'title' => $menu->meta_title,
                'type' => 'article',
                'description' => $menu->meta_description,
                'image' => asset("front/assets/images/png/logo.png"),
                'site_name' => get_cached_parameters('website_name'),
                'updated_time' => time(),
                'image:alt' => get_cached_parameters('website_name'),
                'locale' => locale(),
            ];
        }

        return [
            'url' => url()->current(),
            'title' => get_cached_parameters('website_name'),
            'type' => 'article',
            'description' => get_cached_parameters('description'),
            'image' => asset("front/assets/images/png/logo.png"),
            'site_name' => get_cached_parameters('website_name'),
            'updated_time' => time(),
            'image:alt' => get_cached_parameters('website_name'),
            'locale' => locale(),
        ];
    }
}

if (!function_exists('roles_for_route_back_access')) {
    function roles_for_route_back_access()
    {
        $roles = 'admin';
        if (Schema::hasTable('roles')) {
            $roles = \App\Models\Cms\Role::where('has_access_bo', true)->get()->pluck('name');
            $roles = implode('|', $roles->toArray());
        }
        return $roles;
    }
}

// get video image from youtube for the resources center menu
if (!function_exists('get_video_image_for_youtube')) {
    function get_video_image_for_youtube($id_yotube, $size = 'hq')
    {
        //hqdefault,mqdefault,sddefault,maxresdefault
        return 'https://img.youtube.com/vi/' . $id_yotube . '/' . $size . 'default.jpg';
    }
}

if (!function_exists('get_children_menu')) {
    function get_children_menu($menu)
    {
        $parentMenu = get_first_parent_menu($menu);

        if ($parentMenu) {
            $childrens = \App\Models\Cms\Menu::whereIsActive(true)
                ->where('parent_id', $parentMenu->id)
                ->orderBy('order')
                ->get();

            /*$checkTrainingModule = false;
            if ($children->isNotEmpty()) {
                foreach ($children as $child) {
                    if (in_array(optional($child->module)->reference, $moduleReference)) {
                        $checkTrainingModule = true;
                        break;
                    }
                }
            }
            if ($checkTrainingModule) {
                return $children;
            }*/

            if ($childrens) {
                return $childrens;
            }
        }

        return collect([]);
    }
}

if (!function_exists('get_first_parent_menu')) {
    function get_first_parent_menu($menu)
    {
        if ($menu->parent_id) {
            $parentMenu = \App\Models\Cms\Menu::whereIsActive(true)->find($menu->parent_id);
            if ($parentMenu && intval($parentMenu->parent_id)) {
                return get_first_parent_menu(intval($parentMenu->parent_id));
            } else {
                return $parentMenu;
            }
        }
        return false;
    }
}

if (!function_exists('collection_sort_by')) {
    function collection_sort_by($collection, $field = 'name', $order = 'asc')
    {
        $collectionSorted = collect();
        $arraySorted = [];
        $arrayCollection = [];
        if ($collection->isNotEmpty()) {
            foreach ($collection as $item) {
                array_push($arraySorted, ['id' => $item->id, $field => $item->$field]);
                $arrayCollection[$item->id] = $item;
            }
            if (count($arraySorted)) {
                foreach ($arraySorted as $key => $row) {
                    $text[$row['id']] = strtolower($row[$field]);
                }

                switch ($order) {
                    case 'desc':
                        array_multisort($text, SORT_DESC, $arraySorted);
                        break;
                    default :
                        array_multisort($text, SORT_ASC, $arraySorted);
                }

                foreach ($arraySorted as $itemSorted) {
                    $collectionSorted->push($arrayCollection[$itemSorted['id']]);
                }
            }
        }

        return $collectionSorted;
    }
}
if (!function_exists('getShowButtonAttribute')) {
    function getShowButtonAttribute($id, $route): string
    {
        if (auth()->user()->can('back.' . $route . '.show')) {
            return '<a class="btn btn-default btn-xs""
                href="' . route('back.' . $route . '.show', $id) . '"><span
                        class="glyphicon glyphicon-eye-open"></span></a>';
        }
        return '';
    }
}

if (!function_exists('getEditButtonAttribute')) {
    function getEditButtonAttribute($id, $route): string
    {
        if (auth()->user()->can('back.' . $route . '.edit')) {
            return '<a class="btn btn-primary btn-xs""
                href="' . route('back.' . $route . '.edit', $id) . '">
                <span class="glyphicon glyphicon-pencil"
                        data-placement="top" data-toggle="tooltip"
                        title="' . trans('og.button.edit') . '"></span></a>';
        }
        return '';
    }
}

if (!function_exists('getDeleteButtonAttribute')) {
    function getDeleteButtonAttribute($id, $route): string
    {
        if (auth()->user()->can('back.' . $route . '.destroy')) {
            return '<form style="display:inline"
                    action="' . route('back.' . $route . '.destroy', $id) . '"
                    method="POST">
                <input type="hidden" name="_token" value="' . csrf_token() . '">
                <input type="hidden" name="_method" value="DELETE">
                    <span data-placement="top" data-toggle="tooltip" title="' . trans('og.button.delete') . '">
                        <button class="btn btn-danger btn-xs" type="submit"
                                onclick="return confirm(\'' . trans('og.alert.confirm_deletion') . '\')">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </span>
            </form>';
        }
        return '';
    }
}
