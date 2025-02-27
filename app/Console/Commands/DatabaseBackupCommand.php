<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DatabaseBackupCommand extends Command
{
    protected $signature = 'database:backup';

    protected $description = 'Database Backup';

    public function handle()
    {
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $database = env('DB_DATABASE');
        $path = storage_path('app/private/database/'.date('Y-m-d').'.sql');

        exec("mysqldump -u {$username} -p{$password} {$database} > {$path}");

        $this->info('Database Backup is Completed.');
        Log::info('Database Backup is Completed.');

        return Command::SUCCESS;
    }
}
