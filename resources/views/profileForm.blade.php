@include('includes.head')
<body>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="{{ URL('/')}}">Home</a>
            </div>
        </div>
    </header>

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Profile Editing</h1>
            @if($edit === FALSE)
                {!! Form::model($profile, ['route' => ['profile.store', Auth::user()->id], 'method' => 'post']) !!}
            @else()
                {!! Form::model($profile, ['route' => ['profile.update', Auth::user()->id, $profile->id], 'method' => 'patch']) !!}
            @endif
            <div class="form-group">
                {!! Form::label('fname', 'First Name') !!}
                {!! Form::text('fname', $profile->fname, ['class' => 'form-control','required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('lname', 'Last Name') !!}
                {!! Form::text('lname', $profile->lname, ['class' => 'form-control','required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Body') !!}
                {!! Form::text('body', $profile->body, ['class' => 'form-control','required' => 'required']) !!}
            </div>
            <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Save
            </button>
            {!! Form::close() !!}
        </div>
    </div>
</div>

