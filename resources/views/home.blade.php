@extends('layouts.app')
@section('content')
<body>

    <br>
    <ul>
    @forelse($questions as $question)
        <div class="container">
            <nav aria-label="breadcrumb">
                <button type="button"  class="btn btn-outline-dark btn-sm"
                        data-toggle="tooltip" data-placement="top" title="Updated: {{ $question->created_at->diffForHumans() }}">{{$question->body}}</button>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                            <a href="{{ route('question.show', ['id' => $question->id]) }}"><small>Answers: {{ $question->answers()->count() }}</small></a></li>

                </ol>
            </nav>
        </div>
    @empty
        There are not questions to view,you can create a new question
    @endforelse
    </ul>
    @endsection
    @section('qfoot')
        <nav class="navbar navbar-expand-md fixed-bottom navbar-dark bg-dark">

            <div class="panel-footer"> @yield('qfoot')</div>
        </nav>
        <div class="float-right">
            {{ $questions->links() }}
        </div>
    @endsection
</body>




