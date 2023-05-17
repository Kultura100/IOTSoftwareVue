<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReceiverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $receivers = [
            1 => '0',
        ];

        foreach ($receivers as $receiver) {
            DB::table('receiver_tables')->insert([
                'receiver_key' => $receiver,
            ]);
        }
    }
}
