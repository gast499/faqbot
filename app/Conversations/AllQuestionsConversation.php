<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class AllQuestionsConversation extends Conversation
{
    public function getAllQuestions(){
        $this->say('All questions can be found here: PLACEHOLDER');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->getAllQuestions();
    }
}
