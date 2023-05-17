<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generator = Factory::create();
        $statuses = [
            1 => 'Działa',
            2 => 'Błąd',
            3 => 'Uwaga',
            4 => 'Nieznany',
        ];

        foreach ($statuses as $status) {
            DB::table('device_statuses')->insert([
                'title' => $status,
                'created_at' => $generator->dateTime(),
                'updated_at' => $generator->dateTime(),
            ]);
        }
    }
}
