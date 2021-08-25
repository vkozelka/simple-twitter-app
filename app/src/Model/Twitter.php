<?php
declare(strict_types=1);

namespace PTA\Model;

use GuzzleHttp\Client;

class Twitter {

    private string $__bearerToken;

    private Client $__httpClient;

    public function __construct(string $bearerToken)
    {
        $this->__bearerToken = $bearerToken;

        $this->__httpClient = new Client([
            "base_uri" => "https://api.twitter.com/",
            "timeout" => 5.0
        ]);

    }

    public function getTweets(string $query) {
        try {
            return json_decode($this->__httpClient->get("/1.1/search/tweets.json",[
                "query" => [
                    "q" => urlencode($query),
                    "result_type" => "recent",
                    "count" => 100
                ],
                "headers" => [
                    "Authorization" => "Bearer ".$this->__bearerToken
                ]
            ])->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return [
                "error" => [
                    "message" => $e->getMessage()
                ]
            ];
        }
    }

}