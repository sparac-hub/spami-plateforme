<?php

namespace App\Http\Controllers\Back;

use Artisan;
use App\Http\Controllers\Controller;

class CacheCleanerController extends Controller
{
    public function index()
    {
        return view('back.cache-cleaner.index');
    }

    public function clear(string $type = null)
    {
        if ($type && in_array($type, ['config', 'view', 'cache'])) {
            Artisan::call($type . ':clear');

            return redirect()->route('back.cache-cleaner.index')
                ->with('success', 'Cache [' . $type . '] : cleared');
        }

        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return redirect()->back()->with('success', 'All caches : cleared');
    }
}
