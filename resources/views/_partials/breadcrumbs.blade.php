@if ($breadcrumbs)

    <div class="container navbar-collapse ml-auto">

        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->first)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @elseif (!$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ol>

    </div>
@endif
