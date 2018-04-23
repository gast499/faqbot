<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use BotMan\BotMan\Middleware\ApiAi;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */

    public function handle()
    {
        //---------------------START DIALOGFLOW CODE-------------------------------
        $dialogflow = ApiAi::create(getenv("DIALOGFLOW_API_KEY"))->listenForAction();
        $botman = app('botman');
        $botman->middleware->received($dialogflow);
        //If what the user types matches an action defined in my DialogFlow Agent, it's intent is identified, action, and the response is identified
        //To hit this action, try asking a question
        $botman->hears('input.question', function (BotMan $bot) {
            // The incoming message matched the "input.answer" action on Dialogflow
            // Retrieves Dialogflow information:
            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply']; //captures the DialogFlow reply for the user's message
            $apiAction = $extras['apiAction']; //captures the DialogFlow action for the user's message
            $apiIntent = $extras['apiIntent']; //captures the DialogFlow intent the action was matched with
            $bot->reply($apiReply);
        })->middleware($dialogflow);
        $botman->hears('input.answer', function (BotMan $bot) {
            // The incoming message matched the "input.answer" action on Dialogflow
            // Retrieves Dialogflow information:
            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply']; //captures the DialogFlow reply for the user's message
            $apiAction = $extras['apiAction']; //captures the DialogFlow action for the user's message
            $apiIntent = $extras['apiIntent']; //captures the DialogFlow intent the action was matched with
            $bot->reply($apiReply);
        })->middleware($dialogflow);
        //---------------------------------END DIALOGFLOW CODE----------------------------
        $botman->fallback(function ($bot){
            $bot->reply('Sorry, I didnt understand that');
        });
        $botman->listen();

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    public function widget()
    {
        return view('widget');
    }
    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
}
