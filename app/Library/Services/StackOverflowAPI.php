<?php

namespace App\Library\Services;

use API;

class StackOverflowAPI
{

    //private $stackoverflow;

    function __construct() {
        $this->stackoverflow = API::Site("stackoverflow");
        //$this->$stackoverflow = $stackoverflow;
    }

    public function questions($num){
        $question = $this->stackoverflow->Questions($num)->Exec();
        return $question;
    }

    public function users(){
        $users = $this->stackoverflow->Users()->SortByReputation()->Exec();

        return $users;
    }

    public function search($term){
        $result = $this->stackoverflow->Search($term)->Exec();
        
        return $result;
    }
}
