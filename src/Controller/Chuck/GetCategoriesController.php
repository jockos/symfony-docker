<?php

declare(strict_types=1);


namespace App\Controller\Chuck;


use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetCategoriesController extends AbstractController
{
    /**
     * @Route(path="/categories", methods={"GET"})
     *
     *
     * @param Client $client
     * @param Request $request
     * @return Response
     */
    public function __invoke(Client $client, Request $request): Response
    {
        $apiResponse = $client->get('/jokes/categories');
        $categories = json_decode($apiResponse->getBody()->getContents(), true);

        return $this->render('chuck/categories.html.twig', ['categories' => $categories]);
    }
}
