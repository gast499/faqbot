<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class UnansweredQuestionsConversation extends Conversation
{
    public function getUnansweredQuestions(){
        $this->say('All unanswered questions can be found here: PLACEHOLDER');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->getUnansweredQuestions();
    }
}
