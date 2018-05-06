<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use BotMan\BotMan\Middleware\ApiAi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public $bot;
    public function handle()
    {
        //---------------------START DIALOGFLOW CODE-------------------------------
        $dialogflow = ApiAi::create(getenv("DIALOGFLOW_API_KEY"))->listenForAction();
        $botman = app('botman');
        $botman->middleware->received($dialogflow);
        //If what the user types matches an action defined in my DialogFlow Agent, it's intent is identified, action, and the response is identified
        //To hit this action, try asking a question
        $botman->hears('input.question', function (BotMan $bot) {
            // The incoming message matched the "input.question" action on Dialogflow
            // Retrieves Dialogflow information:
            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply']; //captures the DialogFlow reply for the user's message
            $apiAction = $extras['apiAction']; //captures the DialogFlow action for the user's message
            $apiIntent = $extras['apiIntent']; //captures the DialogFlow intent the action was matched with
            if(Auth::check()){ //Checks if the current user is logged in.
                $body = $bot->getMessage()->getPayload()['message']; //Gets user's question
                $req = Request::create('/question', 'POST', ['body' => $body]); //Creates an HTTP POST Request and passes the user's question to it.
                app('App\Http\Controllers\QuestionController')->store($req); //Sends the Request to the Question Controller's store method
                $bot->reply("Your Question was created successfully.  Check it out here: ".route('home')); //Has the bot send a reply with a link to the request
            }
            else {
                $bot->reply("Hmm, it looks like you aren't signed in yet.  Come back and ask your question again after logging in at " .route('login')." or if you don't have an account yet, feel free to register at: ".route('register'));//Tellls the user to register before asking a question
            }
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
        //return $botman;
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
