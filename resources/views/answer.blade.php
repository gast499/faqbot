@extends('layouts.app')
{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('ViewAnswer',$question,$answer->id)}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><b>Answered by :</b> {{$answer->GetUserName($answer->user_id)}}<br/>
                        <b>E-mail :</b> <u>{{$answer->GetUserEmail($answer->user_id)}}</u><br/>
                        <i>Posted on :{{$answer->created_at->format('l M 6, Y h:i A')}}</i><br/>
                        @if($answer->created_at!=$answer->updated_at)
                            <i>Revised on :{{$answer->updated_at->format('l M 6, Y h:i A')}}</i><br/>
                        @endif
                    </div>
                    <div class="card-body">
                        {{$answer->body}}
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-outline-primary float-right" href="{{ route('answers.edit',['question_id'=> $question, 'answer_id'=> $answer->id, ])}}">
                            Edit Answer
                        </a>

                        {{ Form::open(['method'  => 'DELETE', 'route' => ['answers.destroy', $question, $answer->id]])}}
                        <button class="btn btn-outline-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

            @include("includes.archive")
        </div>
    </div>
@endsection