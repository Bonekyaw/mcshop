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
        // File::put('dump.sql','');
        MySql::create()->setDbName(config('database.connections.mysql.database'))
                        ->setUserName(config('database.connections.mysql.username'))
                        ->setPassword(config('database.connections.mysql.password'))
                        ->setHost(config('database.connections.mysql.host'))
                        ->setPort(config('database.connections.mysql.port'))
                        ->dumpToFile('D:\dump.sql');
    }
}
