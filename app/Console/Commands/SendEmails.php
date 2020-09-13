<?php

namespace App\Console\Commands;

use App\Http\Controllers\RekodController;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Rekod:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notifications';

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
        $rekod = new RekodController();
        $rekod->notification();
    }
}
