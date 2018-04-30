<?php

namespace App;

use \Conner\Tagging\Model\Tag;
use ScoutElastic\Searchable;

class SearchableTag extends Tag
{
    use Searchable;

    protected $indexConfigurator = TagIndexConfigurator::class;

    protected $searchRules = [
        //
    ];

    protected $mapping = [
        'properties' => [
            'name' => [
                'type' => 'text',
                'analyzer' => 'english'
            ]
        ]
    ];
}
