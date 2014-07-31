<?php

use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    protected $repo;

    protected function _before()
    {
        $this->repo = new StatusRepository;
    }


    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
        // Given I have 2 users
        $users = TestDummy::times(2)->create('Larabook\Users\User');

        // And statuses for both of them 
        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[0]->id,
            'body' => 'First status'
        ]);
        TestDummy::times(2)->create('Larabook\Statuses\Status', [
            'user_id' => $users[1]->id,
            'body' => 'Second status'
        ]);

        // when I fetch statuses for one user
        $statusesForUser = $this->repo->getAllForUser($users[0]);

        // then I should receive only the relevant ones
        $this->assertCount(2, $statusesForUser);
        $this->assertEquals('First status', $statusesForUser[0]->body);
        $this->assertEquals('First status', $statusesForUser[1]->body);
    }

    /** @test */

    public function it_saves_a_status_for_a_user()
    {
        // Given I have an unsaved status
        $status = TestDummy::create('Larabook\Statuses\Status', [
            'user_id' => null,
            'body' => 'A status'
        ]);

        // And an existing user
        $user = TestDummy::create('Larabook\Users\User');

        // when I try to persist a status
        $savedStatus = $this->repo->save($status, $user->id);

        // Then it should be saved
        $this->tester->seeRecord('statuses', [
            'body' => 'A status'
        ]);

        // And the status should have the correct user_id
        $this->assertEquals($user->id, $savedStatus->user_id);
    }

}