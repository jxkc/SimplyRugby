<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Doctor;

class DoctorTest extends TestCase
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

        $response = $this->actingAs($user)->withSession([])->get('/doctors');

        $response->assertStatus(200);
    }

    public function test_pageAddDoctor(): void {
        $doctorData = [
            'doctor_name' => 'Dr. John Smith',
            'doctor_address' => '456 Example Ave, Example Town',
            'doctor_phone' => '987-654-3210',
        ];

        $doctor = Doctor::create($doctorData);

        $response = $this->post(route('doctors.store'), $doctorData);

        $response->assertStatus(302);

        $this->assertDatabaseHas('doctors', $doctorData);
    }
}
