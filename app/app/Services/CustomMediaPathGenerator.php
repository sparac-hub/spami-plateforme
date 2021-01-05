<?php

namespace App\Services;

use Spatie\MediaLibrary\Media;
use Spatie\MediaLibrary\PathGenerator\PathGenerator;

class CustomMediaPathGenerator implements PathGenerator
{
    /*
     * Get the path for the given media, relative to the root storage path.
     */
    public function getPath(Media $media): string
    {
        return date('Y') . '/' . date('m') . '/' . $this->getBasePath($media) . '/';
    }

    /*
     * Get the path for conversions of the given media, relative to the root storage path.
     * @return string
     */

    protected function getBasePath(Media $media): string
    {
        return $media->getKey();
    }

    /*
     * Get a (unique) base path for the given media.
     */

    public function getPathForConversions(Media $media): string
    {
        return date('Y') . '/' . date('m') . '/' . $this->getBasePath($media) . '/conversions/';
    }
}
