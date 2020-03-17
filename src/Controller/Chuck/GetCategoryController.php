<?php

declare(strict_types=1);


namespace App\Controller\Chuck;


use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetCategoryController extends AbstractController
{
    /**
     * @Route(path="/categories/{category}", methods={"GET"})
     *
     *
     * @param Client $client
     * @param string $category
     * @return Response
     */
    public function __invoke(Client $client, string $category): Response
    {
        $apiResponse = $client->get("/jokes/random?categories=$category");
        $categoryData = json_decode($apiResponse->getBody()->getContents(), true);

        return $this->render('chuck/category.html.twig', ['data' => $categoryData]);
    }
}
