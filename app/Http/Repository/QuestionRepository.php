<?php
namespace App\Http\Repository;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\database\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
/**
 * Question Repository class
 */
class QuestionRepository
{
    /**
     * Get a list of all archived question : month & counts
     *
     * @return array  Array containing list of all question archives : Month.Year ->(Count)
     */
    public function getArchivesList()
    {
        $archives = Question::ArchiveStats();
        return $archives;
    }
    /**
     * Get a list of questions : ALL or by Month/year from archives based on condition.
     *
     * @return array  Array containing list of all questions
     */
    public function getQuestionsList()
    {
        $questions = Question::FilterQuestions();
        return $questions;
    }
}