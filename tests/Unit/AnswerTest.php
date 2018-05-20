<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Answer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $answer = factory(Answer::class)->make();
        $answer->user()->associate($user);
        $answer->question()->associate($question);
        $this->assertTrue($answer->save());
    }
    public function testUpdate()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $answer = factory(Answer::class)->make();
        $answer->user()->associate($user);
        $answer->question()->associate($question);
        $answer->save();
        $answer1 = Answer::find($answer->id)->first();
        $answer1->body =  $answer1->body.' - Updated by Kashish for test';
        $this->assertTrue($answer1->save());
    }
    public function testDelete()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $answer = factory(Answer::class)->make();
        $answer->user()->associate($user);
        $answer->question()->associate($question);
        $answer->save();
        $answer1 = Answer::find($answer->id)->first();
        $this->assertTrue($answer1->delete());
    }
    public function testUpdateRetrieveTimestamps()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $answer = factory(Answer::class)->make();
        $answer->user()->associate($user);
        $answer->question()->associate($question);
        //saved
        $answer->save();
        $answer1 = Answer::find($answer->id)->first();
        $answer1->body =  $answer1->body.' - TimeStamp testing';
        //updated
        $answer1->save();
        //retrievd & check timestamps
        $this->assertTrue(Answer::find($answer1->id)->created_at != Answer::find($answer1->id)->updated_at);
    }
}
