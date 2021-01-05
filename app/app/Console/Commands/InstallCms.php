<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Artisan;
use Cache;
use DB;

class InstallCms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:install {migrate=yes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop all database tables and install CMS';

    /**
     * Create a new command instance.
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
        $confirmationMessage =
            "Be careful!
                \n This command will drop all database tables.
                \n Do you really wish ton continue?";

        if ($this->confirm($confirmationMessage)) {

            $started_at = new \DateTime(date('Y-m-d H:i:s'));

            $this->clearAll();

            $this->runMigrations($this->argument('migrate'));

            $this->runSeeders();

            $this->clearAll();

            $this->importTranslationsToDatabase();

            $this->info("\n CMS successfully installed ");

            $ended_at = new \DateTime(date('Y-m-d H:i:s'));
            $this->info("\n Duration : " . $started_at->diff($ended_at)->i . ' minutes ' . $started_at->diff($ended_at)->s . ' seconds');

        }
    }

    public function clearAll()
    {
        Cache::flush();
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
    }

    public function runMigrations(string $migrate)
    {
        $migrate = null;

        while (!in_array($migrate, ['yes', 'y', 'no', 'n'])) {
            $migrate = $this->ask('Run migrate:fresh ? (yes/no)', 'yes');
        }

        $this->info('Installing CMS... ');

        if (in_array($migrate, ['yes', 'y'])) {
            $this->dropAllTablesThenRunMigrations();
        } else {
            $this->truncateAllTables();
        }
    }

    public function dropAllTablesThenRunMigrations()
    {
        Artisan::call('migrate:fresh'); // Migration paths: AppServiceProvider@setUpMigrationPaths
    }

    public function truncateAllTables()
    {
        $tables = DB::select('SHOW TABLES');
        $db = DB::getDatabaseName();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($tables as $table) {
            if ($table->{'Tables_in_' . $db} != 'migrations') {
                DB::table($table->{'Tables_in_' . $db})->truncate();
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function runSeeders()
    {
        Artisan::call('db:seed');
    }

    public function importTranslationsToDatabase()
    {
        Artisan::call('db:load-translations');
    }
}
