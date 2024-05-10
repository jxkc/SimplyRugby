<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Coach;

class CoachTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_pageConnect    (): void
    {
        $user = User::factory()->create([
            'email' => 'root@example.com',
        ]);

        $user->markEmailAsVerified();

        $response = $this->actingAs($user)->withSession([])->get('/coaches');

        $response->assertStatus(200);
    }

    public function test_pageAddCoach(): void {
        $coachData = [
            'coach_name' => 'Coach Alex Johnson',
        ];
        
        $coach = Coach::create($coachData);

        $response = $this->post(route('coaches.store'), $coachData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('coaches', $coachData);
    }
}
