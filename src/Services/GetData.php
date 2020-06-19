<?php

namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetData
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getResultFromApi(string $apiTarget, string $subject = NULL, $query = null, int $page = 1)
    {
        $response = $this->httpClient->request('GET', 'https://rickandmortyapi.com/api/' . $apiTarget . '/?page=' . $page . '&' . $subject . '=' . $query);

        return $response->toArray();
    }

    public function getSingleResult(string $apiTarget, int $id)
    {
        $response = $this->httpClient->request('GET', 'https://rickandmortyapi.com/api/' . $apiTarget . "/" . $id);

        return $response->toArray();
    }
}
