<?php

namespace Tests\BotMan;

use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use App\Http\Controllers\BotManController;
use PHPUnit\Framework\Assert as PHPUnit;



class DialogFlowTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDialogFlowQuestion()
    {
        $botController = new BotManController();
        $this->bot->receives('How do I install Laravel?');
        $b = $botController->handle()->getMessages()[0]->getExtras();
        PHPUnit::assertEquals('input.question', $b['apiAction']);
        PHPUnit::assertEquals('question', $b['apiIntent']);
        PHPUnit::assertEquals('Great Question. Check back later for an answer.', $b['apiReply']);
    }
    public function testDialogFlowAnswer()
    {
        $botController = new BotManController();
        $this->bot->receives('Go to Laravel.com and download it from there.');
        $b = $botController->handle()->getMessages()[0]->getExtras();
        PHPUnit::assertEquals('input.answer', $b['apiAction']);
        PHPUnit::assertEquals('fallback', $b['apiIntent']);
        PHPUnit::assertEquals('Thank you for answering someone\'s question.', $b['apiReply']);
    }
}