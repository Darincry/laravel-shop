<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:install';

    protected $description = 'Installation';

    public function handle()
    {
        $this->call('composer:install');
        $this->call('storage:link');
        $this->call('migrate');
        return self::SUCCESS;
    }
}
