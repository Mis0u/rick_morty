<?php

namespace App\Controller;

use App\Services\GetData;
use App\Services\ListConstForApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class EpisodesController extends AbstractController
{
    /**
     * @Route("/episodes/{page}/{query}", name="episodes", requirements={"page"="\d+", "query"="\D+"})
     */
    public function episodes(int $page = 1, string $query = null, GetData $data, Request $request)
    {
        $apiData = $data->getResultFromApi(ListConstForApi::SEARCH_EPISODE, $query, $page);

        if ($request->query->get('season')) {
            $query = str_replace(" ", "+", $request->query->get('season'));
            $apiData = $data->getResultFromApi(ListConstForApi::SEARCH_EPISODE, ListConstForApi::SUBJECT_EPISODE_QUERY, $query, $page);
        }


        return $this->render('episodes/episodes.html.twig', [
            'data_episodes' => $apiData,
            'query' => $query
        ]);
    }
}
