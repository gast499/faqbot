@extends('layouts.app')
@if($edit === FALSE)
    {{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('NewAnswer',$question)}}
@endsection

@else()
    {{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('EditAnswer',$question,$answer->id)}}
@endsection
@endif


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Post Answer</div>
                    <div class="card-body">
                        @if($edit === FALSE)
                            {!! Form::model($answer, ['route' => ['answers.store', $question], 'method' => 'post']) !!}

                        @else()
                            {!! Form::model($answer, ['route' => ['answers.update', $question, $answer], 'method' => 'patch']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('body', 'Answer:') !!}
                            {!! Form::textarea('body', $answer->body, ['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <button class="btn btn-outline-primary float-right" value="submit" type="submit" id="submit">Save
                        </button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection