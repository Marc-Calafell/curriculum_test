<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudiesControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testIndexNotLogged(){


    }

    public function testIndex() {
        $user=factory(App\User::class)->create();
        $studies=factory(Scool\Curriculum\Models\Study::class,50)->create();
        $this->actingAs($user);
        $this->get('studies');
        $this->assertResponseOk();

        $this->assertViewHas('studies');

        $studies= $this->response->getOriginalContent()->getData();
    }


}
