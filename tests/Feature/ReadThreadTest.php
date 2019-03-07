<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadTest extends TestCase
{
    use DatabaseMigrations;


//    @test
    public function test_a_user_can_view_all_threads()
    {
        $thread = factory('App\Thread')->create();
        $response = $this->get('/threads');

        $response->assertStatus(200);
        $response->assertSee($thread->title);
    }
    //    @test
    public function test_a_user_can_read_a_single_thread()
    {
        $thread = factory('App\Thread')->create();

        $this->get('/threads/'. $thread->id)
        ->assertSee($thread->title);
    }
//    @test
    public function test_a_user_can_read_replies_that_are_associated_with_a_thread()
    {
//        Given we have a thread
        $thread = factory('App\Thread')->create();

//        And that thread includes replies
        $reply = factory('App\Reply')->create(['thread_id' => $thread->id]);

//        when we visit a thread page
//        then we should see the reply
        $this->get('/threads/'. $thread->id)
            ->assertSee($reply->body);

    }


}
