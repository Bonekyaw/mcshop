<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Spatie\DbDumper\Databases\MySql;

class BackupDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This backups all database tables';
    protected $process;

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
        File::put('dump.sql','');
        MySql::create()->setDbName(env('DB_DATABASE'))
                        ->setUserName(env('DB_USERNAME'))
                        ->setPassword(env('DB_PASSWORD'))
                        ->setHost(env('DB_HOST'))
                        ->setPort(env('DB_PORT'))
                        ->dumpToFile('F:\dump.sql');
    }
}
