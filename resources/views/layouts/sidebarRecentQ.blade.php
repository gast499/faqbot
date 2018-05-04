<!-- sidebar nav -->
<div>
    <nav id="sidebar-nav">
        <ul class="nav nav-pills nav-stacked">
            @foreach($RecentQ as $Recent)
                <li><a href="#">{{$Recent->body}}</a></li>
            @endforeach
        </ul>


    </nav>
</div>