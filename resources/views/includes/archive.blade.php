<div class="col-md-3">
    <div class="card sb-card">
        <div class="card-body">

            <h4><b>Archives</b></h4>

            @foreach($archives as $stats)
                <li>
                    <a href="{{ route('home.archive', ['month'=> $stats->month,'year' => $stats->year]) }}">
                        {{  date("F", mktime(0, 0, 0, $stats->month, 1)).' '. $stats->year.' ('.$stats->qcount.')' }}
                    </a>
                </li>
            @endforeach
        </div>
    </div>
    <br/>
    <div class="card sb-card">
        <div class="card-body">

            <h4><b>Quick Links</b></h4>
            <li>
                <a href="{{ route('home.myquestions', ['user_id' => Auth::user()->id]) }}">
                    My Questions {{ '('.Auth::user()->questions()->count().')' }}
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}">
                    All Questions {{ '('. \App\Question::ALL()->count().')' }}
                </a>
            </li>

        </div>
    </div>
</div>