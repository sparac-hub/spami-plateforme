<?php

if (!function_exists('generate_menu_url')) {
    function generate_menu_url(array $menu_item): string
    {
        if ($menu_item['link_type_id']) {
            if ($menu_item['link_type_id'] == 1) {
                if ($menu_item['slug']) {
                    // TODO: Helper locale_prefix() : Take in considertion AutoRedirectToDefaultLocale
                    return url(locale_prefix() . '/' . $menu_item['slug']);
                }
            } elseif ($menu_item['link_type_id'] == 2) {
                return env('APP_URL') . '/' . locale() . '/' . $menu_item['internal_link'];
            } elseif ($menu_item['link_type_id'] == 3) {
                return $menu_item['http_protocol'] . $menu_item['external_link'];
            } elseif ($menu_item['link_type_id'] == 4) {
                if (isset($menu_item['menu_id'])) {
                    $menu_id = $menu_item['menu_id'];
                    $menu = \App\Models\Cms\Menu::findOrFail($menu_id);

                    if ($menu && $menu['slug']) {
                        // TODO: Helper locale_prefix() : Take in considertion AutoRedirectToDefaultLocale
                        return url(locale_prefix() . '/' . $menu['slug']);
                    }
                }
            }
        }

        return '#';
    }
}


if (!function_exists('generate_menu_url_from_obj')) {
    function generate_menu_url_from_obj(App\Models\Cms\Menu $menu)
    {
        $menu = $menu->load('module', 'page');
        return generate_menu_url($menu->toArray());
    }
}


if (!function_exists('buildTree')) {
    function buildTree(array $elements, int $parentId = null): array
    {
        $branch = [];

        foreach ($elements as $element) {

            if ($element['parent_id'] == $parentId) {

                if (isset($element['label'])) {

                    $children = buildTree($elements, $element['id']);

                    if ($children) {
                        $element['childrens'] = $children;
                    }

                    $menu_item = [
                        'id' => $element['id'],
                        'menu_group_id' => $element['menu_group_id'],
                        'module_id' => $element['module_id'],
                        'parent_id' => $element['parent_id'],
                        'link_type_id' => $element['link_type_id'],
                        'http_protocol' => $element['http_protocol'],
                        'external_link' => $element['external_link'],
                        'internal_link' => $element['internal_link'],
                        'link_target' => $element['link_target'],
                        'is_active' => $element['is_active'],
                        'icon' => $element['icon'],
                        'order' => $element['order'],
                        'css_class' => $element['css_class'],
                        'deleted_at' => $element['deleted_at'],
                        'created_at' => $element['created_at'],
                        'updated_at' => $element['updated_at'],
                        'label' => $element['label'],
                        'slug' => $element['slug'],
                        'meta_title' => $element['meta_title'],
                        'meta_description' => $element['meta_description'],
                        'content' => $element['content'],
                        'module' => $element['module'] ?? false,
                        'page' => $element['page'] ?? false,
                        'childrens' => $children,
                    ];

                    $menu_item['url'] = generate_menu_url($element);

                    $branch[] = $menu_item;
                } else {
                    Log::error('Error in helper buildTree()');
                }
            }
        }

        return $branch;
    }
}

if (!function_exists('getAllChildIds')) {
    function getAllChildIds($elements, $ids = []): array
    {
        foreach ($elements as $element) {
            $ids[] = $element['id'];
            if (count($element['childrens'])) {
                $ids = getAllChildIds($element['childrens'], $ids);
            }
        }

        return $ids;
    }
}
