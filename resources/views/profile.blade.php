@extends('layouts.app')
{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('MyProfile')}}
@endsection
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Profile</div>

                    <div class="card-body ">
                        {{--<img src="/uploads/avatars/{{ $profile->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">--}}
                        <img src="/uploads/avatars/user.jpg" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <br/>

                        <span class="font-weight-bold">First Name:</span> {{$profile->fname}}</br>
                        <br/>

                        <span class="font-weight-bold">Last Name: </span>{{$profile->lname}}</br>
                        <br/>
                        <span class="font-weight-bold">About Me: </span>{{$profile->body}}</br>

                    </div>
                    <div class="card-footer">
                        <a class="btn btn-outline-primary float-right" href="{{ route('profile.edit', ['profile_id' => $profile->id,'user_id' => $profile->user->id]) }}">
                            Edit
                        </a>

                        {{ Form::open(['method'  => 'DELETE', 'route' => ['profile.destroy', Auth::User(), $profile]])}}
                        <button class="btn btn-outline-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection