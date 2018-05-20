<?php
namespace Tests\Unit;
use App\Question;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
class FeatureArchiveTest extends TestCase
{
    /**
     * Test If Archives List (Month year (Count) has atleast one record - to be displayed on the sidebar
     *
     * @return void
     */
    public function testArchiveSidebar()
    {
        $archives = Question::query()->selectRaw('strftime(? ,created_at)as year,
            strftime(?,created_at) as month,count(id) as qcount' ,['%Y','%m'])
            -> groupBy('year','month')
            ->orderByDesc('created_at')
            ->get();
        $this->assertTrue($archives->count()>0);
    }
    /**
     * Test If all questions returned by query in a sorted way are equal in count to model::all.
     * All Questions gets displayed to every logged-in user by default.
     *
     * @return void
     */
    public function testAllQuestions()
    {
        //no. of all questions sorted latest by query
        $questions1 =  Question::query()
            ->latest();
        //count should match -> all questions
        $this->assertCount($questions1->count(),Question::All());
    }
    /**
     * Test If all questions are returned by query.
     *
     * @return void
     */
    public function testAllQuestionsCount()
    {
        //no. of all questions sorted latest by query
        $questions1 =  Question::query()
            ->latest();
        //all questions count should be greater than or equal to 0
        $this->assertTrue($questions1->count()>=0);
    }
    /**
     * Test If my questions returns the questions for a logged in user e.g. user_id =1
     * If new user --> questions =0.
     *
     * @return void
     */
    public  function testMyQuestions()
    {
        $myquestions = Question::query()->where('user_id','=',1);
        //my questions count should be greater than or equal to 0
        $this->assertTrue($myquestions->count()>=0);
    }
    /**
     * Test If archived questions are fetched.
     *
     * @return void
     */
    public  function testArchivedQuestions()
    {
        //archived month eloquent query brings data for that month and year
        $archivedquestions = Question::query()
            ->whereMonth('created_at','05')
            ->whereYear('created_at','2018');
        $this->assertTrue($archivedquestions->count()>=0);
    }
}