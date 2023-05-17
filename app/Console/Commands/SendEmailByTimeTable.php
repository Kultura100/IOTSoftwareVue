<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\TimeTableMail;
use App\Models\Transmitter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailByTimeTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send {type} {user_id} {device_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command allow us to send a email with specified data.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $type = $this->argument('type');
        $user_id = $this->argument('user_id');
        $device_id = $this->argument('device_id');
        $device = Transmitter::where([['id',$device_id],['user_id',$user_id]])->first();
        if($type == "temperature")
        {
            $data = [
                'devicename' => $device->name,
                'temperature1' => isset($device->getReads()->latest()->first()->temperature1) ? $device->getReads()->latest()->first()->temperature1 : 0,
                'readtime' => isset($device->getReads()->latest()->first()->created_at) ? Carbon::parse($device->getReads()->latest()->first()->created_at)->diffForHumans() : null,
            ];
        }else if($type == "humidity"){
            $data = [
                'devicename' => $device->name,
                'humidity' => isset($device->getReads()->latest()->first()->humidity) ? $device->getReads()->latest()->first()->humidity : 0,
                'readtime' => isset($device->getReads()->latest()->first()->created_at) ? Carbon::parse($device->getReads()->latest()->first()->created_at)->diffForHumans() : null,
            ];
        } else if ($type == "alldata"){
            $data = [
                'devicename' => $device->name,
                'devicebattery' => $device->batterypercentage,
                'temperature1' => isset($device->getReads()->latest()->first()->temperature1) ? $device->getReads()->latest()->first()->temperature1 : 0,
                'humidity' => isset($device->getReads()->latest()->first()->humidity) ? $device->getReads()->latest()->first()->humidity : 0,
                'readtime' => isset($device->getReads()->latest()->first()->created_at) ? Carbon::parse($device->getReads()->latest()->first()->created_at)->diffForHumans() : null,
            ];
        }
        Mail::to(User::where('id', $user_id)->first()->email)->send(new TimeTableMail($data));
    }
}
