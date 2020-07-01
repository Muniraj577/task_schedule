<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Status of users';

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
        date_default_timezone_set('Asia/Kathmandu');
        $timezone = date_default_timezone_get();
        $jobs = DB::table('jobs')->get();
        foreach ($jobs as $job){
            DB::table('jobs')->whereDate('end_date', '<', date('Y-m-d h:i:s', time()))->update(['status' => 'Expired']);
            echo "Status changed";
        }
    }
}
