<?php
/*
if (!function_exists('get_id_from_slug')) {
    /**
     * @param string|integer $slug_with_id string
     * @return integer
     * -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --/
    function get_id_from_slug($slug_with_id)
    {
        if (!is_numeric($slug_with_id)) {
            $array = explode('-', $slug_with_id);
            return end($array);
        } else {
            return $slug_with_id;
        }
    }
}
*/

if (!function_exists('advanced_trim')) {
    function advanced_trim($str): string
    {
        return preg_replace('/^[\pZ\pC]+|[\pZ\pC]+$/u', '', $str);
    }
}
