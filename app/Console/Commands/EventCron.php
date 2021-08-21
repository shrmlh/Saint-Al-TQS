<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EventCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to update events.';

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
        Log::info("Cron is working fine!");
        DB::table('events')
                ->where([
                    ['event_start','<',now()],
                    ['event_status','=', 1]
                ])
                ->update(['event_status' => 2]);
        DB::table('events')
                ->where([
                    ['event_end','<',now()],
                    ['event_status','=', 3]
                ])
        ->update(['event_status' => 5]);
    }
}
