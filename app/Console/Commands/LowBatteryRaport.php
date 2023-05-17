<?php

namespace App\Console\Commands;

use App\Models\Raport;
use App\Models\Transmitter;
use Illuminate\Console\Command;

class LowBatteryRaport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'device:lowbattery {user_id} {device_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command checking a generating raport if battery is low.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user_id = $this->argument('user_id');
        $device_id = $this->argument('device_id');

        Raport::create([
            'title' => "(".Transmitter::where([['id', $device_id],['user_id', $user_id]])->first()->name.") - Bateria",
            'description' => "Wygląda na to, że w twoim urządzeniu kończy się bateria, wymień ją przy najbliższej okazji!",
            'device_id' => $device_id,
            'user_id' => $user_id,
        ]);
    }
}
