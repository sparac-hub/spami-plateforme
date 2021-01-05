<?php

if (!function_exists('format_label_is_active')) {
    function format_label_is_active($model): string
    {
        return ($model->is_active) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
    }
}


if (!function_exists('show_button')) {
    /**
     * @return string
     */
    function show_button($href): string
    {
        return '<a class="btn btn-default btn-xs""
                   href="' . $href . '"><span
                            class="glyphicon glyphicon-eye-open"></span></a>';
    }
}

if (!function_exists('edit_button')) {
    /**
     * @return string
     */
    function edit_button($href): string
    {
        return '<a class="btn btn-primary btn-xs""
                   href="' . $href . '">
                   <span class="glyphicon glyphicon-pencil" 
                         data-placement="top" data-toggle="tooltip" 
                         title="' . trans('og.button.edit') . '"></span></a>';
    }
}

if (!function_exists('delete_button')) {
    /**
     * @return string
     */
    function delete_button($href): string
    {
        return '<form style="display:inline"
                      action="' . $href . '"
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
}