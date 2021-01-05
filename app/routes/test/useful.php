<?php

// thumbnails url pattern:  thumbnails/{dimensions}/{id}-{filename}
//                       => thumbnails/500x500/1-football.jpg
Route::get('thumbnails/{id}/{width}/{height}', function ($id, $width, $height) {
    $media = \Spatie\MediaLibrary\Media::find($id);
    if ($media) {
        $img = \Intervention\Image\Facades\Image::make($media->getPath())->fit($width, $height);
    } else {
        $img = \Intervention\Image\Facades\Image::make('https://static.designboom.com/wp-content/uploads/2018/09/photos-burning-man-2018-designboom-1.jpg')->fit($width,
            $height);
    }
    return $img->response();
})->name('thumbnails');

Route::get('thumbnails/{dimensions}/{id}-{filename}', function ($dimensions, $id, $filename) {
    // Cache images via htaccess
    $dimensions = explode('x', $dimensions);
    // $dimensions : $width x $height
    if (!isset($dimensions[0]) || isset($dimensions[1]) || !is_int($dimensions[0]) || is_int($dimensions[1])) {
        abort(404);
    }
    $media = \Spatie\MediaLibrary\Media::find($id);

    $filepath = ($media) ? $media->getPath() : public_path('logo.png');
    return \Intervention\Image\Facades\Image::make($filepath)->fit($dimensions[0], $dimensions[1]);

})->name('thumbnails');


Route::get('location-export', function () {

    $countries = \App\Models\Cms\Country::with('governorates.cities.zones')->orderBy('id')->get();

    $indent = "&nbsp;&nbsp;&nbsp;&nbsp;";

    foreach ($countries as $country) {
        echo "<br>'";
        echo addslashes($country->name);
        echo "' => ";

        if (!$country->governorates->count()) {
            echo " null,";
        } else {

            echo "[";

            foreach ($country->governorates as $governorate) {
                echo "<br>{$indent}'";
                echo addslashes($governorate->name);
                echo "' => ";

                if (!$governorate->cities->count()) {
                    echo " null ],<br>";
                } else {

                    echo "[";

                    foreach ($governorate->cities as $city) {
                        echo "<br>{$indent}{$indent}'";
                        echo addslashes($city->name);
                        echo "' => ";

                        if (!$city->zones->count()) {
                            echo " null ],<br>";
                        } else {

                            echo "[";
                            foreach ($city->zones as $zone) {
                                echo "<br>{$indent}{$indent}{$indent}";
                                echo "'" . addslashes($zone->name) . "' => '" . $zone->postal_code . "',";
                            }
                            echo "<br>{$indent}{$indent}{$indent}],   // Zone end";
                        }
                    }
                    echo "<br>{$indent}{$indent}],  // City end";
                }
            }
            echo "<br>{$indent}], // Governorate end";

            //echo "<br>], // Country end";
        }
    }

});
