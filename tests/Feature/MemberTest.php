<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Artisan;

class MemberTest extends TestCase
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

        $response = $this->actingAs($user)->withSession([])->get('/members');

        $response->assertStatus(200)->assertSee(route('coaches.index'));
    }

    public function test_pageAddMember(): void {
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

        // Simulate a form submission with valid data.
        $response = $this->post(route('members.store'), $memberData);

        // Assert that the member was successfully added.
        $response->assertStatus(302); // Assuming successful redirect after form submission.

        // Check if the member was added to the database.
        $this->assertDatabaseHas('members', $memberData);
    }
}
