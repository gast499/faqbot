Questions.php file line 17-2

{{ Form::open(['method'  => 'DELETE', 'route' => ['questions.destroy', $question->id]])}}
<button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
</button>
{!! Form::close() !!}

Answers.php file line 11-20
<div class="card-footer">
    {{ Form::open(['method'  => 'DELETE', 'route' => ['answers.destroy', $question, $answer->id]])}}
    <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
    </button>
    {!! Form::close() !!}
    <a class="btn btn-primary float-right" href="{{ route('answers.edit',['question_id'=> $question, 'answer_id'=> $answer->id, ])}}">
        Edit Answer
    </a>
</div>