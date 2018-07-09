<?php

namespace Tests\Feature;

use App\Http\Controllers\NominationController;
use App\Nomination;
use App\User;
use Faker\Generator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NominationControllerTest extends TestCase
{

    use WithFaker;
    /**
     * Test the create New Nomination and the related connections
     *
     * @param Generator $faker
     * @return void
     */
    public function testNewNomination()
    {

        $controller = new NominationController();

        $user = factory(User::class)->create();

        $this->actingAs($user);

        $testData = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'office' => $this->faker->word,
            'district' => $this->faker->city
        ];

        $resultId = $controller->newNomination($testData);

        $nomination = Nomination::find($resultId);


        // Was nomination nominee created?
        $this->assertSame($nomination->nominee->email, $testData['email']);

        // was the nomination support create?
        $this->assertTrue($nomination->support->first()->user->id  == $user->id);

        // was a new active nomination create for the user?
        $this->assertTrue($user->supportedNominations->count() == 1);

    }
}
