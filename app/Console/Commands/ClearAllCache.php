<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ClearAllCache extends Command
{
    protected $signature = 'route:clear-cache';
    protected $description = 'Clear route cache';

    public function handle()
    {
        Artisan::call('cache:clear');
        $this->info('Application cache cleared.');

        Artisan::call('config:clear');
        $this->info('Configuration cache cleared.');

        Artisan::call('route:clear');
        $this->info('Route cache cleared.');

        Artisan::call('view:clear');
        $this->info('Compiled views cleared.');

        Artisan::call('optimize:clear');
        $this->info('Cached bootstrap files cleared.');

        $this->info('All caches have been cleared successfully.');
    }
}