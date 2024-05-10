<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Psy\Readline\Hoa\EventListens;
use Tests\TestCase;
use App\Models\JuniorMember;
use App\Models\User;
use App\Models\Guardian;
use App\Models\Doctor;
use App\Models\Member;

class JuniorTest extends TestCase
{
    use RefreshDatabase;
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_pageConnect(): void
    {
        $user = User::factory()->create([
            'email' => 'root@example.com',
        ]);

        $user->markEmailAsVerified();

        $response = $this->actingAs($user)->withSession([])->get('/players/junior/manager');

        $response->assertStatus(200);
    }

    public function test_pageAddJuniorPlayer(): void
    {
        $memberData = [
            'fname' => 'John',
            'lname' => 'Doe',
            'dob' => '1990-01-01',
            'address' => '123 Main St',
            'postcode' => '12345',
            'email' => 'john@example.com',
            'phone' => '123-456-7890',
        ];

        $member = Member::create($memberData);

        // Create a doctor
        $doctorData = [
            'doctor_name' => 'Dr. John Smith',
            'doctor_address' => '456 Example Ave, Example Town',
            'doctor_phone' => '987-654-3210',
        ];
        $doctor = Doctor::create($doctorData);

        // Create the first guardian
        $guardianData_1 = [
            'guardian_name' => 'Mrs. Jane Doe',
            'guardian_address' => '789 Sample St, Sample City',
            'guardian_postcode' => '12345',
            'guardian_phone' => '555-555-5555',
            'guardian_signature' => null,
        ];
        $guardian1 = Guardian::create($guardianData_1);

        // Create the second guardian
        $guardianData_2 = [
            'guardian_name' => 'Mr. John Smith',
            'guardian_address' => '456 Test Ave, Test City',
            'guardian_postcode' => '54321',
            'guardian_phone' => '111-222-3333',
            'guardian_signature' => null,
        ];

        $guardian2 = Guardian::create($guardianData_2);

        // Create a JuniorMember
        $juniorMemberData = [
            'sru_number' => $member->sru_number,
            'doctorid' => '1',
            'guardianid_1' => '1',
            'guardianid_2' => '2',
            'position' => 'Goalkeeper', // Example position
        ];
        $juniorMember = JuniorMember::create($juniorMemberData);

        $response = $this->post(route('junior-members.store'), $juniorMemberData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('doctors', $doctorData);
        $this->assertDatabaseHas('guardians', $guardianData_1);
        $this->assertDatabaseHas('guardians', $guardianData_2);
        $this->assertDatabaseHas('junior_members', $juniorMemberData);
    }
}
