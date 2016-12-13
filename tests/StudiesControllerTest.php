<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Scool\Curriculum\Repositories\StudyRepository;

class StudiesControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    protected $repository;

    public function setUp() {
     //   $this->login();
        $this->repository = Mockery::mock(StudyRepository::class);
    }

    public function tearDown() {
        Mockery::close();
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testIndexNotLogged(){


    }

    /**
     *
     */
    public function testIndex() {
        $this->login();
        $this->actingAs($user);
        $this->get('studies');
        $this->assertResponseOk();

        $this->assertViewHas('studies');

        $studies= $this->response->getOriginalContent()->getData()['studies'];

        $this->assertInstanceOf(Illuminate\Database\Eloquent\Collection::class, $studies);
    }

public function testStore(){
    list($user, $studies) = $this->login();
    $this->post('studies');
    $this->assertRedirectedToRoute();
}

    /**
     * @return array
     */
    public function login()
    {
        $user = factory(App\User::class)->create();
        $studies = factory(Scool\Curriculum\Models\Study::class, 50)->create();
        return array($user, $studies);
    }


}
