<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProtocolSeeder;
use Database\Seeders\DeviceStatusSeeder;
use Database\Seeders\ReceiverTableSeeder;
use Database\Seeders\TransmitterTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'iot@localhost',
         ]);
         $this->call([DeviceStatusSeeder::class, ProtocolSeeder::class, ReceiverTableSeeder::class, TransmitterTableSeeder::class]);
    }
}
