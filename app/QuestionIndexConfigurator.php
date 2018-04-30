<?php

namespace App;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class QuestionIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    protected $name = 'questions';

    protected $settings = [
        //
    ];
}
