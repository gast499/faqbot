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
        $dialogflow = ApiAi::create(getenv("DIALOGFLOW_API_KEY"))->listenForAction();
        $botman = app('botman');
        $botman->middleware->received($dialogflow);
        $botman->hears('install_laravel', function (BotMan $bot) {
            // The incoming message matched the "my_api_action" on Dialogflow
            // Retrieve Dialogflow information:
            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply'];
            $apiAction = $extras['apiAction'];
            $apiIntent = $extras['apiIntent'];

            $bot->reply($apiReply);
        })->middleware($dialogflow);
        $botman->hears('Hello', function (BotMan $bot){
            $bot->types();
            $bot->reply('BLAGH');
        });
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
