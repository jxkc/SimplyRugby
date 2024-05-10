<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Guardian;

class GuardianTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_pageConnect(): void
    {
        $user = User::factory()->create([
            'email' => 'root@example.com',
        ]);

        $user->markEmailAsVerified();

        $response = $this->actingAs($user)->withSession([])->get('/guardian');

        $response->assertStatus(200);
    }

    public function test_pageAddGuardian(): void {
        $guardianData  = [
            'guardian_name' => 'Mrs. Jane Doe',
            'guardian_address' => '789 Sample St, Sample City',
            'guardian_postcode' => '12345',
            'guardian_phone' => '555-555-5555',
            'guardian_signature' => null,
        ];

        $guardian = Guardian::create($guardianData);

        $response = $this->post(route('guardian.store'), $guardianData);

        $response->assertStatus(302);
    }
}
