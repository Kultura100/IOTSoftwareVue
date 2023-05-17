<?php

namespace App\Console;

use App\Models\TimeTable;
use App\Models\Transmitter;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $tasks = TimeTable::all();

        foreach ($tasks as $task) {
            $frequencyFunc = $task->frequency_function;
            $frequencyFuncParams = $task->frequency_params ? unserialize($task->frequency_params): [];
            $command = $task->command_name;
            $schedule->command($command.' '.$task->type.' '.$task->user_id.' '.$task->device_id)->$frequencyFunc(...$frequencyFuncParams);
        }

        $transmitters = Transmitter::all();
        foreach($transmitters as $device){
            if($device->batterypercentage != null){
                if($device->batterypercentage < 30)
                {
                    $schedule->command('device:lowbattery'.' '.$device->user_id.' '.$device->id)->daily();
                }
            }
        }
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
