<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Member;
use App\Models\PlayerProfile;
use App\Models\Skill;
use App\Models\User;

class PlayerProfileTest extends TestCase
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

        $response = $this->actingAs($user)->withSession([])->get('/players/playerprofile');

        $response->assertStatus(200);
    }

    public function test_pageAddPlayerProfile(): void
    {
        // create a member
        $memberData = [
            'fname' => 'John',
            'lname' => 'Doe',
            'dob' => '1990-01-01',
            'address' => '123 Main St',
            'postcode' => '12345',
            'email' => 'john@example.com',
            'phone' => '123-456-7890',
        ];

        // Create a member in the database
        $member = Member::create($memberData);

        // Define the skill data
        $skillsData = [
            'passing_standard' => 'Beginner',
            'passing_spin' => 'Beginner',
            'passing_pop' => 'Beginner',
            'tackling_front_rear' => 'Beginner',
            'tackling_rear_side' => 'Beginner',
            'tackling_side' => 'Beginner',
            'tackling_scrabble' => 'Beginner',
            'kicking_drop_punt' => 'Beginner',
            'kicking_drop_grubber' => 'Beginner',
            'kicking_drop_goal' => 'Beginner',
        ];

        // Create a skill in the database
        $skill = Skill::create($skillsData);

        // Create a new PlayerProfile instance
        $playerProfile = new PlayerProfile([
            'sru_number' => '1',
            'skillid' => $skill->id,
            'squad' => 'Example Squad',
            'comment' => 'Null',
            'medical_note' => 'Null',
        ]);
        
        $playerProfileData = [
            'sru_number' => $playerProfile->sru_number,
            'skillid' => '1',
            'squad' => $playerProfile->squad,
            'comment' => $playerProfile->comment,
            'medical_note' => $playerProfile->medical_note,
        ];

        $playerProfile->skillid = $skill->id;
        $playerProfile->save();

        $response = $this->post(route('players.playerprofile.store'), $playerProfileData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('player_profiles', $playerProfileData);
        $this->assertDatabaseHas('skills', $skillsData);
    }
}
