@if ($errors->any())
    <div class="container ml-auto bg-danger">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div><br />
@endif