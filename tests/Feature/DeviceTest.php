<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Read;
use App\Models\User;
use App\Models\Receiver;
use App\Models\Transmitter;
use App\Models\ReceiverTable;
use App\Models\TransmitterTable;
use Database\Seeders\DeviceStatusSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeviceTest extends TestCase
{
    public function test_device_screen_can_be_rendered()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/devices');
        $response->assertStatus(200);
    }

    public function test_add_receiver()
    {
        $this->seed(DeviceStatusSeeder::class);
        $user = User::factory()->create();
        ReceiverTable::create([
            'receiver_key' => 0,
        ]);
        $receiver = Receiver::create([
            'name' => 'Test',
            'status_id' => 1,
            'receiverId' => 0,
            'user_id' => $user->id,
        ]);

        $this->assertTrue(Receiver::where('name','Test')->exists());
    }

    public function test_add_transmitter()
    {
        $user = User::factory()->create();
        TransmitterTable::create([
            'transmitter_key' => 1,
        ]);
        $receiver = Transmitter::create([
            'name' => 'Test',
            'status_id' => 1,
            'transmitterId' => 1,
            'receiver_id' => 1,
            'user_id' => $user->id,
        ]);

        $this->assertTrue(Transmitter::where('name','Test')->exists());
    }

    public function test_check_if_device_send_data()
    {
        $user = User::factory()->create();
        $read = Read::create([
            'transmitter_id' => 1,
        ]);

        $this->assertTrue(Read::where('transmitter_id','1')->count() > 0);
    }
}
