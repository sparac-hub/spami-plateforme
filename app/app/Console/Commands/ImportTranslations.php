<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\TranslationLoader\LanguageLine;
use Storage;

class ImportTranslations extends Command
{
    protected $language_lines;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:load-translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load Translation to database [for: spatie/laravel-translation-loader]';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        config(['filesystems.disks.spatie_temp.driver' => 'local']);
        config(['filesystems.disks.spatie_temp.root' => base_path('resources/lang')]);

        $except_directories = ['vendor'];

        $locales = Storage::disk('spatie_temp')->directories();

        collect($locales)
            ->filter(function ($value) use ($except_directories) {
                return !collect($except_directories)->contains($value);
            })
            ->each(function ($locale) {

                $files = Storage::disk('spatie_temp')->allFiles($locale);

                collect($files)->each(function ($file) use ($locale) {

                    $file = str_replace_first($locale . '/', '', $file);
                    $file = str_replace_last('.php', '', $file);

                    $file_content = array_dot(array_dot(trans($file, [], $locale)));

                    foreach ($file_content as $key => $value) {

                        $this->language_lines[$file][$key]['text'][$locale] = $value;
                    }
                });
            });

        foreach ($this->language_lines as $group => $keys) {
            foreach ($keys as $key => $value) {
                $language_line = LanguageLine::where(['group' => $group, 'key' => $key])->first();

                if ($language_line) {
                    /* Todo : add option --force-update
                     $language_line->update([
                        'text' => $value['text'],
                    ]);
                    */
                } else {
                    LanguageLine::create([
                        'group' => $group,
                        'key' => $key,
                        'text' => $value['text'],
                    ]);
                }
            }
        }
    }
}
