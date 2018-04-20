<?php

namespace Tests\BotMan;

use Tests\TestCase;
use App\Http\Controllers\BotManController;


class DialogFlowTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicDialogFlow()
    {
        $botController = new BotManController();
        $this->bot->receives('installing laravel help');
        $this->bot->assertReply($botController->handle());
    }
}