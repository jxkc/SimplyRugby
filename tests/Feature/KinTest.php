<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\NextOfKin;
use Tests\TestCase;

class KinTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_pageConnect(): void
    {
        $user = User::factory()->create([
            'email' => 'root@example.com',
        ]);

        $user->markEmailAsVerified();

        $response = $this->actingAs($user)->withSession([])->get('/kin');

        $response->assertStatus(200);
    }

    public function test_pageAddKin(): void {
        $kinData = [
            'kin_name' => 'John Doe',
            'kin_address' => '123 Example St, Example City',
            'kin_phone' => '123-456-7890',
        ];
        
        $kin = NextOfKin::create($kinData);

        $response = $this->post(route('kin.store'), $kinData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('next_of_kin', $kinData);
    }
}
