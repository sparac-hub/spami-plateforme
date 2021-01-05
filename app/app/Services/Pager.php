<?php

/**
 * This class generates two buttons [previous] [next] (The previous and next item for a given record.)
 * To customize the view : Check acme/pager.blade.php
 */

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class Pager
{
    public static function generate(Model $model, $route_name, array $where = [])
    {
        $previous_record = $model::orderBy('id', 'DESC')
            ->where('id', '<', $model->id ?? null)
            ->where('menu_id', $model->menu_id ?? null)
            ->where($where)
            ->first();

        $next_record = $model::orderBy('id')
            ->where('id', '>', $model->id)
            ->where($where)
            ->first();

        return view('common.pager', compact('previous_record', 'next_record', 'route_name'));
    }
}