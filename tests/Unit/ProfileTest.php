<?php

namespace Tests\Unit;

use App\Profile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class profileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {

        $user = factory(\App\User::class)->make();
        $user->save();
        $profile = factory(Profile::class)->make();
        $profile->user()->associate($user);
        $this->assertTrue($profile->save());
    }
    public function testUpdate()
    {
        $profile = Profile::find(1);
        $profile->fname = 'New Name';
        $profile->lname = 'New last Name';
        $this->assertTrue($profile->save());
    }
    public function testDelete()
    {
        $user = factory(\App\User::class)->make();
        $user->save();
        $profile = factory(Profile::class)->make();
        $profile->user()->associate($user);
        $profile->save();
        $this->assertTrue(Profile::find($profile->id)->delete());
    }
    public function testRetrieve()
    {
        $user = factory(\App\User::class)->make();
        $user->save();
        $profile = factory(Profile::class)->make();
        $profile->fname ='Kashish';
        $profile->user()->associate($user);
        $profile->save();
        $this->assertTrue(Profile::find($profile->id)->fname == 'Kashish');
    }
//    public function testProfilePictureSave()
//    {
//        $user = factory(\App\User::class)->make();
//        $user->save();
//        $profile = factory(Profile::class)->make();
//        $profile->avatar ='Kashish.JPEG';
//        $profile->user()->associate($user);
//        $profile->save();
//        $this->assertTrue(Profile::find($profile->id)->avatar == 'Kashish.JPEG');
//    }
}
