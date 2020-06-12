<?php

namespace App\Controller;

use App\Services\GetData;
use App\Services\ListConstForApi;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(GetData $data)
    {
        $dataAllCharacters = $data->getResultFromApi(ListConstForApi::SEARCH_CHARACTER);

        return $this->render('home/home.html.twig', [
            'total_characters' => $dataAllCharacters,
        ]);
    }
}
