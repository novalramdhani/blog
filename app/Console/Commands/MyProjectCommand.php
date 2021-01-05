<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh all database migrations with seeders';

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
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:refresh');
        $this->call('db:seed');

        if($this->confirm('Do you want use tinker shell for interact data?')) {
            $this->call('tinker');
            $this->info('Thank you for using tinker shell');
        }

        $this->call('migrate:status');

        $this->info('All database and seeders completed successfully.');
    }
}
