<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiSimrsService
{
    protected $baseUrl;
    protected $client;

    public function __construct()
    {
        $this->baseUrl = getenv('API_SIMRS');
        $this->client = new Client();
    }

    public function getRequest($endpoint)
    {
        $result = $this->client->get($this->baseUrl . $endpoint);
        $result = json_decode($result->getBody()->getContents(), true);
        return $result;
    }
}
