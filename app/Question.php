<?php

namespace App;

//Add this trait to index a model wiith ElasticSearch
//docs: https://github.com/babenkoivan/scout-elasticsearch-driver
use ScoutElastic\Searchable;

//This trait makes a model Taggable
//docs: https://github.com/rtconner/laravel-tagging
use \Conner\Tagging\Taggable;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    use Searchable;
    use Taggable;

    //Create an Index Configurator instance to get index settings
    protected $indexConfigurator = MyIndexConfigurator::class;

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
}
