<?php

namespace App\Controller;

use App\Services\GetData;
use App\Services\ListConstForApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class CharactersController extends AbstractController
{
    /**
     * @Route("/characters/{page}/{query}", name="characters", requirements={"page"="\d+", "query"="\D+"})
     */
    public function characters(int $page = 1, string $query = null, GetData $data, Request $request)
    {
        $apiData = $data->getResultFromApi(ListConstForApi::SEARCH_CHARACTER, ListConstForApi::SUBJECT_NAME_QUERY, $query, $page);

        if ($request->query->get('name')) {
            $query = str_replace(" ", "+", $request->query->get('name'));
            $apiData = $data->getResultFromApi(ListConstForApi::SEARCH_CHARACTER, ListConstForApi::SUBJECT_NAME_QUERY, $query, $page);
        }


        return $this->render('characters/characters.html.twig', [
            'data_characters' => $apiData,
            'query' => $query
        ]);
    }
}
