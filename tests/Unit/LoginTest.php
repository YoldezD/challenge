<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * Test login with correct credentials.
     *
     * @return void
     */
    public function test_login_with_correct_credentials()
{
    $response = $this->post('/login', [
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

   
    $response->assertRedirect('/');

}


    /**
     * Test login with incorrect credentials.
     *
     * @return void
     */
    public function test_login_with_incorrect_credentials()
    {
        $response = $this->withoutMiddleware()->post('/login', [
            'email' => 'invalid@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors();
    }
}
