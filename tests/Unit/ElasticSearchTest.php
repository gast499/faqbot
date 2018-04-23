<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use App\Question;

class ElasticSearchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testQuestionSearch()
    {
        $questions = Question::search('')->get();
        $this->assertTrue($questions instanceof Collection);
    }
}
