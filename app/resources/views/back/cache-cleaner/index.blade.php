@extends('back.layouts.app')


@section('content')

    @include('back._common.alerts.messages')

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('back.cache-cleaner.clear', ['type' => 'view' ]) }}"
               class="btn btn-block btn-default">Clear view</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('back.cache-cleaner.clear', ['type' => 'config' ]) }}"
               class="btn btn-block btn-default">Clear config</a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('back.cache-cleaner.clear') }}" class="btn btn-block btn-primary">Clear
                All Caches</a>
        </div>
    </div>


    <?php
    /*
    $storage = \Cache::getStore(); // will return instance of FileStore
    $filesystem = $storage->getFilesystem(); // will return instance of Filesystem
    $dir = (\Cache::getDirectory());
    $keys = [];
    foreach ($filesystem->allFiles($dir) as $file1) {

        if (is_dir($file1->getPath())) {

            foreach ($filesystem->allFiles($file1->getPath()) as $file2) {
                $content = unserialize(substr(\File::get($file2->getRealpath()), 10));
                if(!empty($content)) {
                    $keys = array_merge($keys, [$file2->getRealpath() => empty($content)?null:$content]);
                }
            }
        }
        else {

        }
        dump($keys);
    }
    */
    ?>

@endsection
