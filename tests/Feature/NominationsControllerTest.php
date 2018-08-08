<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NominationsControllerTest extends TestCase
{
    public $user;
    public function __construct()
    {
        $this->user = factory(User::class);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateNomination()
    {

    }
}
