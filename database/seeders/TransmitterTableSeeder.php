<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransmitterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transmitters = [
            1 => '1',
        ];

        foreach ($transmitters as $transmitter) {
            DB::table('transmitter_tables')->insert([
                'transmitter_key' => $transmitter,
            ]);
        }
    }
}
