<?php

namespace App;

//use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;
//use \Conner\Tagging\Taggable;

class Question extends Model
{

    //use Searchable;
    //use Taggable;
    /*
    protected $indexConfigurator = MyIndexConfigurator::class;

    protected $searchRules = [
        //
    ];

    protected $mapping = [
        'properties' => [
            'body' => [
                'type' => 'text',
                'analyzer' => 'english'
            ]
        ]
    ];
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
