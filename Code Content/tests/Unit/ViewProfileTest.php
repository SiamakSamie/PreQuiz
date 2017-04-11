<?php

namespace Tests\Unit;

use Tests\TestCase;
use \App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewProfileTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProfile_view()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $this->visit('/profile/' . $user->id)
            ->see($user->name);
    }
    
}
