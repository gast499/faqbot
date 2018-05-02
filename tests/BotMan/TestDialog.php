<?php

namespace Tests\BotMan;

use BotMan\BotMan\Middleware\ApiAi;

class TestDialog extends ApiAi
{
    public function sendEmptyRequest()
    {
        $response = $this->http->post($this->apiUrl, [], [
            'query' => 'test',
            'sessionId' => 'test',
            'lang' => $this->lang,
        ], [
            'Authorization: Bearer '.$this->token,
            'Content-Type: application/json; charset=utf-8',
        ], true);

        $this->response = json_decode($response->getContent(), true);

        return $this->response;
    }
}