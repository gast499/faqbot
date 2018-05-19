@if(session()->has('message'))
    <div class="container ml-auto bg-white">
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    </div>
@endif