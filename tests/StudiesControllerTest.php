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

    public function __construct() {
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

        $this->repository->ShouldReceive('all')->once()->andReturn(collect([]));

        $this->createDummySudies();

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


    private function createDummySudies()  {

        $study1= new Study();
        $study2= new Study();
        $study3= new Study();

        $studies = [
            $study1,
            $study2,
            $study3
        ];

        return collect($studies);
    }


}
