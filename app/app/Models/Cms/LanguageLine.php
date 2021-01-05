<?php

namespace App\Models\Cms;

use Spatie\TranslationLoader\LanguageLine as SpatieLanguageLine;
use App\Models\Traits\ButtonsTrait;

class LanguageLine extends SpatieLanguageLine
{
    protected $backRouteName = 'app_texts';

    use ButtonsTrait;
}


