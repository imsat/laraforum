<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;


    public function test_an_unauthenticated_user_cannot_create_a_thread(){

        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = factory('App\Thread')->make();

        $this->post('/threads', $thread->toArray());
    }

    public function test_an_authenticated_user_can_create_a_forum_hreads(){

          $this->withoutExceptionHandling();

         $this->actingAs(factory('App\User')->create());

          $thread = factory('App\Thread')->make();

          $this->post('/threads', $thread->toArray());

          $this->get($thread->path())
              ->assertSee($thread->title)
              ->assertSee($thread->body);


   }
}
