<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StorageLinkCommand extends Command
{
    protected $signature = 'storage:link';

    protected $description = 'Create a symbolic link from "public/storage" to "storage/app/public"';

    public function handle()
    {
        if (file_exists(public_path('storage'))) {
            $this->error('The "public/storage" directory already exists.');
        } else {
            $this->laravel->make('files')->link(
                storage_path('app/public'), public_path('storage')
            );
            $this->info('The [public/storage] directory has been linked.');
        }
    }
}
