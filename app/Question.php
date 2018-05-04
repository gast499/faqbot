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
}
