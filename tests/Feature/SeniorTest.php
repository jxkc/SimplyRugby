<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\JuniorMember;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Member;
use App\Models\NextOfKin;
use App\Models\SeniorMember;

class SeniorTest extends TestCase
{
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

        $response = $this->actingAs($user)->withSession([])->get('/players/senior/manager');

        $response->assertStatus(200);
    }

    public function test_pageAddSeniorPlayer(): void {
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

        $kinData = [
            'kin_name' => 'John Doe',
            'kin_address' => '123 Example St, Example City',
            'kin_phone' => '123-456-7890',
        ];
        $kin = NextOfKin::create($kinData);

        $seniorMemberData = [
            'sru_number' => '1',
            'doctorid' => '1',
            'kinid' => '1',
            'position' => 'Prop',
        ];

        $seniorMember = SeniorMember::create($seniorMemberData);

        $response = $this->post(route('senior-members.manager.submit'), $seniorMemberData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('members', $memberData);
        $this->assertDatabaseHas('doctors', $doctorData);
        $this->assertDatabaseHas('next_of_kin', $kinData);
        $this->assertDatabaseHas('senior_members', $seniorMemberData);
    }
}
