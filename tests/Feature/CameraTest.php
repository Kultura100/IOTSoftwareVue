<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CameraTest extends TestCase
{
    public function test_camera_screen_can_be_rendered()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/cameras');
        $response->assertStatus(200);
    }

    public function test_get_information_from_camera_if_is_online()
    {
        $response = Http::withBasicAuth('admin', '****')->get("http://192.168.1.4:48151");
        if($response->getStatusCode() == 200)
        $this->assertTrue(true);
    }

}
