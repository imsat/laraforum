<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
   use DatabaseMigrations;

       public function test_an_authenticated_user_may_participate_in_forum_threads(){

           $this->withoutExceptionHandling();

           // Given we have a authenticated user
           $user = factory('App\User')->create();
//           $this->be($user);
           $this->signIn($user);

           // And an exiting Thread
           $thread = factory('App\Thread')->create();
           // When the User adds a reply to the  thread
           $reply = factory('App\Reply')->make();
           $this->post($thread->path().'/replies', $reply->toArray());
           // Then their reply should be visible on the page

           $this->get($thread->path())
              ->assertSee($reply->body);
    }

    public function test_an_unauthenticated_user_may_not_participate_in_forum_threads(){

        $this->withoutExceptionHandling();

        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = factory('App\Thread')->create();

        $reply = factory('App\Reply')->make();

        $this->post($thread->path().'/replies', $reply->toArray());

    }
}
