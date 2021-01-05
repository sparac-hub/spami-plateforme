<?php

return [

    'placement' => [
        'bottom',
        'top',
        'middle',
        'right',
        'left',
    ],

    'order_column_type' => [
        'asc' => 'Ascendant',
        'desc' => 'Descendant',
    ],

    'type' => [
        'all' => 'All Pages',
        'free' => 'Per Page',
    ],

    'select_type' => [
        'latest' => 'Latest',
        'free_select' => 'Free Select',
    ],

    'homes' => [
        null => 'Widgets does not belong to a home',
        \App\Models\Cms\Widget::HOME_PAGE => 'Page d\'accueil',
    ]

];
