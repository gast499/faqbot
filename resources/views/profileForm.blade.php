@extends('layouts.app')

@if($edit === FALSE)
    {{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('CreateProfile')}}
@endsection
@else()
    {{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('EditProfile',$profile)}}
@endsection
@endif
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Profile</div>
                    <div class="card-body">
                        @if($edit === FALSE)
                            {!! Form::model($profile, ['route' => ['profile.store', Auth::user()->id], 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
                        @else()
                            {!! Form::model($profile, ['route' => ['profile.update', Auth::user()->id, $profile->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}
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
                            {!! Form::label('body', 'About Me') !!}
                            {!! Form::textarea('body', $profile->body, ['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <div class="form-group">
                            @if($profile->avatar  !== null)
                                {{--<img src="/uploads/avatars/{{ $profile->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">--}}
                                <img src="/uploads/avatars/user.jpg" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                            @endif
                            <label for="avatar">Profile Image</label>
                            <input type="file" name="avatar" id="avatar" class="form-group">
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