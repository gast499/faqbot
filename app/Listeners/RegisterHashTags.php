<?php

namespace App\Listeners;

use App\Events\QuestionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterHashTags
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  QuestionCreated  $event
     * @return void
     */
    public function handle(QuestionCreated $event)
    {
        $question = $event->question;

        // Find all unique hashtags in question body
        preg_match_all("/(#\w+)/", $question->body, $matches);
        $tags = array_unique($matches[0]);

        foreach($tags as $tag) {
            $question->tag($tag);
        }

        $question->save();
    }
}
