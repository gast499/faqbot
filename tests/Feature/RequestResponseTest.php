<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
class RequestResponseTest extends TestCase
{
    /**
     * test if the welcome page returns a 200-status code.
     *
     * @return void
     */
    public function testWelcomePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    /**
     * test if the login page returns a 200-status code.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
    /**
     * test if the register page returns a 200-status code.
     *
     * @return void
     */
    public function testregisterPage()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
    /**
     * test if the password reset page returns a 200-status code.
     *
     * @return void
     */
    public function testPasswordResetPage()
    {
        $response = $this->get('/password/reset');
        $response->assertStatus(200);
    }
}