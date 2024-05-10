<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\TrainingSession;

class TrainingSessionTest extends TestCase
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

        $response = $this->actingAs($user)->withSession([])->get('/trainingsessions');

        $response->assertStatus(200);
    }

    public function test_addTrainingSession(): void { 
        $trainingSessionData = [
            'dos' => '1990-01-01',
            'location' => 'Dundee',
            'time' => '14:00',
            'session_note' => 'TEST',
            'medical_report' => 'TEST REPORT'
        ];

        TrainingSession::create($trainingSessionData);

        $response = $this->post(route('trainingsessions.store'), $trainingSessionData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('training_sessions', $trainingSessionData);
    }
}
