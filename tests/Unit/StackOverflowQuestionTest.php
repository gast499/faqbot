<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Library\Services\StackOverflowAPI;

class StackOverflowQuestion extends TestCase
{

    function testStackOverflow(){
        $questionTest = new StackOverflowAPI();

        $search = $questionTest->search("Laravel");

        if(sizeof($search->Fetch()) > 0){
            $this->assertTrue(True);
        }
        else{
            $this->assertTrue(False);
        }
    }
}
