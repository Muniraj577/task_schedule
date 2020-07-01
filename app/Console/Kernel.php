<?php

namespace App\Console;

use App\Job;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('update:status')->everyMinute();
//        $schedule->call(function (){
//           $jobs = Job::all();
//           foreach ($jobs as $job){
//               DB::table('jobs')
//                   ->select('status')
//                   ->where('status', 'Active')
//                   ->where('start_date', '=', 'end_date')
//                   ->update($job->status, '=', 'Expired');
//           }
//        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
