<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        /**$user = new user;

        $user->name = 'Bob';
        $user->email = 'rr637@njit.edu';
        $user->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';
        $user->remember_token = str_random(10);**/

        $user = factory(\App\User::class)->create([
            'name' => 'Bob',
            'email' => 'rr637@njit.edu',
            'email_verified_at' => now(),
            'password' => 'password', // secret
            'remember_token' => str_random(10),]);

        $this->assertDatabaseHas(
            'users', [
            'name' => 'Bob',
            'email'=>'rr637@njit.edu']);
    }
}
