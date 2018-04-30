<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use App\Question;
use App\SearchableTag;

class ElasticSearchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testConnection()
    {
        $curl = curl_init();
        $elasticHost = env('SCOUT_ELASTIC_HOST');

        curl_setopt_array($curl, array(
            CURLOPT_URL => $elasticHost,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));
        $response = json_decode(curl_exec($curl), true);

        $this->assertTrue(
            gettype($response) === 'array',
            'Could not connect to ElasticSearch. Have you set SCOUT_ELASTIC_HOST in your .env file?'
        );

        //Will probably want to expand on this assertion to check for specific ES cluster_uuid
        $this->assertTrue(
            array_key_exists('cluster_uuid', $response),
            "Unverified ElasticSearch connection. Are you sure {$elasticHost} is the proper endpoint?"
        );
    }

    public function testQuestionSearch()
    {
        $questions = Question::search('*')->get();
        $this->assertTrue($questions instanceof Collection);
    }

    public function testTagSearch()
    {
      $tags = SearchableTag::search('*')->get();
      $this->assertTrue($tags instanceof Collection);
    }
}
