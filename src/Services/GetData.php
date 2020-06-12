<?php

namespace App\Services;

use App\Services\HandleApiError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetData
{
    private $handleApiError;
    private $httpClient;

    public function __construct(HandleApiError $handleApiError, HttpClientInterface $httpClient)
    {
        $this->handleApiError = $handleApiError;
        $this->httpClient = $httpClient;
    }

    public function singleResult(string $apiTarget, int $id)
    {
        $response = $this->httpClient->request('GET', 'https://rickandmortyapi.com/api/' . $apiTarget . '/' . $id);

        $this->handleApiError->getError($response->getStatusCode(), Response::HTTP_NOT_FOUND);

        return $response->toArray();
    }

    public function getResultFromApi(string $apiTarget, string $subject = NULL, $query = null, int $page = 1)
    {
        $response = $this->httpClient->request('GET', 'https://rickandmortyapi.com/api/' . $apiTarget . '/?page=' . $page . '&' . $subject . '=' . $query);

        $this->handleApiError->getError($response->getStatusCode(), Response::HTTP_NOT_FOUND);

        return $response->toArray();
    }
}
