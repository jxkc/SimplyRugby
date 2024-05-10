<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class ContactViewTest extends TestCase
{
    /**
     * Testing if an example user can access the contacts page.
     * Tests to see if the links are there as well.
     */
    public function test_pageConnect(): void
    {
        Artisan::call('migrate:fresh');

        $user = User::factory()->create([
            'email' => 'root@example.com',
        ]);

        $user->markEmailAsVerified();

        $response = $this->actingAs($user)->withSession([])->get('/contacts');

        $response->assertStatus(200)->assertSee(route('doctors.index'))->assertSee(route('guardian.index'))->assertSee(route('kin.index'));
    }
}
