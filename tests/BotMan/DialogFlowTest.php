<?php

namespace Tests\BotMan;

use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\ApiAi;
use PHPUnit\Framework\Assert as PHPUnit;

class DialogFlowTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDialogAPI()
    {
        $dialogflow = TestDialog::create(getenv("DIALOGFLOW_API_KEY"))->listenForAction();
        $response = $dialogflow->sendEmptyRequest();
        $status = intval($response['status']['code'] / 100);
        PHPUnit::assertEquals( 2, $status );
    }
}