<?php

namespace Tests\Unit;

use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class QuestionTest extends TestCase
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
        $question = factory(Question::class)->make();
        $question->user()->associate($user);
        $this->assertTrue($question->save());
    }

    public function testTags() {
        $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(Question::class)->make();
        $question->user()->associate($user);
        $tag = '#test';
        $question->body = $question->body . $tag;
        $question->save();
        $this->assertTrue($question->tags[0]->name === $tag);
    }

    public function testUpdate()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $question1 = Question::find($question->id)->first();
        $question1->body ='test question';
        $this->assertTrue($question1->save());
    }
    public function testdelete()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $question1 = Question::find($question->id)->first();
        $this->assertTrue($question1->delete());
    }
    public function testRetrieve()
    {
        $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(Question::class)->make();
        $question->user()->associate($user);
        $question->body ="new question body for test";
        $question->save();
        $this->assertTrue(Question::find($question->id)->body == "new question body for test");
    }
}
