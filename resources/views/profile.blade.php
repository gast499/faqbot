@include("includes.head")
<body>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="{{url('home')}}">Home</a>
            </div>
        </div>
    </header>

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Profile Information feature</h1>

            <span class="font-weight-bold">First Name:</span> {{$profile->fname}}</br>
            <span class="font-weight-bold">Last Name: </span>{{$profile->lname}}</br>
            <span class="font-weight-bold">Body: </span>{{$profile->body}}</br>

        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">Your Questions</strong>
                        <h3 class="mb-0">
                            <p class="text-dark">Number of post</p>
                        </h3>
                        <div class="mb-1 text-muted">12</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success">Your Answer</strong>
                        <h3 class="mb-0">
                            <p class="text-dark">Number of Post</p>
                        </h3>
                        <div class="mb-1 text-muted">8</div>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-success float-right" href="{{ route('profile.edit', ['profile_id' => $profile->id,'user_id' => $profile->user->id]) }}">
            Edit
        </a>
    </div>

</div>

</body>