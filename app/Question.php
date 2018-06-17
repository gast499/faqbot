<?php

namespace App;

//Add this trait to index a model wiith ElasticSearch
//docs: https://github.com/babenkoivan/scout-elasticsearch-driver
use ScoutElastic\Searchable;

//This trait makes a model Taggable
//docs: https://github.com/rtconner/laravel-tagging
use \Conner\Tagging\Taggable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Events\QuestionCreated;

class Question extends Model
{

    use Searchable;
    use Taggable;
    use Notifiable;

    protected $fillable = ['body'];
    protected $dispatchesEvents = [
      'created' => QuestionCreated::class,
    ];

    //Create an Index Configurator instance to get index settings
    protected $indexConfigurator = QuestionIndexConfigurator::class;

    //This allows you to set different search algorithms for this model.
    //Not explicitly required
    protected $searchRules = [
        //
    ];

    //Custom ES model mapping settings
    protected $mapping = [
        'properties' => [
            'body' => [
                'type' => 'text',
                'analyzer' => 'english'
            ]
        ]
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }


    public static function RecentQuestions()
    {
        $Recentq = Question::selectRaw('body,created_at,id')->orderBy('created_at','DESC')->limit(5)->get();
        return $Recentq;
    }
    public static function FilterQuestions()
    {
        //Archived Questions
        if ((\request('month')) and (\request('year')) ) {
            return static::query()
                ->whereMonth('created_at', \request('month'))
                ->whereYear('created_at', \request('year'))
                ->latest()
                ->paginate('6');
        }
        //My Questions
        elseif(\request('user_id'))
        {
            return static::query()
                ->where('user_id','=',\request('user_id'))
                ->latest()
                ->paginate(6);
        }
        //All Questions
        else
        {
            //All Questions paginated
            return static::query()
                ->latest()
                ->paginate('6');
        }
    }
    public static function ArchiveStats()
    {
        return static::query()->selectRaw("to_char(created_at, 'YYYY') as year,
                to_char(created_at, 'MM') as month, count(id) as qcount")
            -> groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get();
    }
}
