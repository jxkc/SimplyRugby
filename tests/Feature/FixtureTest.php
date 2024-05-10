<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Fixture;
use App\Models\User;

class FixtureTest extends TestCase
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

        $response = $this->actingAs($user)->withSession([])->get('/fixtures');

        $response->assertStatus(200);
    }

    public function test_addFixture(): void {
        $fixtureData = [
            'opposition_name' => 'Opponent FC',
            'dom' => '2024-04-28',
            'location' => 'Stadium Name',
            'kick_off' => '15:00',
            'result' => 'Draw', // Example result
            'score' => '2-2', // Example score
        ];

        $fixture = Fixture::create($fixtureData);

        $response = $this->post(route('fixtures.store'), $fixtureData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('fixtures', $fixtureData);
    }
}
