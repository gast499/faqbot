<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use \App\Http\Repository\QuestionRepository;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
class QuestionComposer
{
    public $archiveQuestionList;
    /**
     * Create a question composer.
     *
     *  @param QuestionRepository $movie
     *
     * @return void
     */
    public function __construct(QuestionRepository $questions)
    {
        $this->archiveQuestionList = $questions->getArchivesList();
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('archives', $this->archiveQuestionList);
    }
}