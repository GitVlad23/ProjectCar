<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function testCreateUserSuccessful()
    {
        $this->post('/register', [
            'name' => 'Vlad',
            'email' => 'vlad@mail.com',
            'password' => '123321'
        ]);

        $response = $this->get('/');
        $response->assertOk();
    }

    public function testAuthorize()
    {
        $this->post('/login', [
            'email' => 'vladislav@mail.ru',
            'password' => '332233'
        ]);

        $response = $this->get('/');
        $response->assertOk();
    }

    public function testFailedEmailAuth()
    {
        $this->post('/login', [
            'email' => 'vladislav@mmml.ru',
            'password' => '332233'
        ]);

        $response = $this->get('/');
        $response->assertOk();
    }

    public function testFailedPasswordAuth()
    {
        $this->post('/login', [
            'email' => 'vladislav@gmail.ru',
            'password' => 'hsuda213'
        ]);

        $response = $this->get('/');
        $response->assertOk();
    }
}
