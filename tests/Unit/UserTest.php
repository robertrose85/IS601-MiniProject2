<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UserTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $name = rand(1,10000);
        $password = rand(10001,20000);

        $user = factory(\App\User::class)->create([
            'name' => 'Bob',
            'email' => $name . '@njit.edu',
            'email_verified_at' => now(),
            'password' => (string)$password, // secret
            'remember_token' => str_random(10),]);

        $this->assertDatabaseHas(
            'users', [
            'name' => 'Bob',
            'email'=>$name . '@njit.edu']);
    }

    public function testExample1()
    {
        $user = User::inRandomOrder()->first();

        $user->name = 'Steve Smith';
        $user->save();

        $this->assertDatabaseHas('users',
            ['name'=>'Steve Smith']);
    }

    public function testExample2()
    {
        $user = User::inRandomOrder()->first();

        echo $user; // for testing purposes

        $user->delete();

        $this->assertDatabaseMissing('users', [$user]);
    }
}
