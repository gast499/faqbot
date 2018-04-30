<?php

namespace App;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class TagIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    /**
     * @var array
     */

    protected $name = 'tags';

    protected $settings = [
        //
    ];
}
