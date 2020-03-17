<?php

declare(strict_types=1);


namespace App\Controller\Chuck;


use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetRandomController extends AbstractController
{
    /**
     * @Route("/random")
     */
    public function __invoke(Client $client, Request $request): Response
    {
        $apiResponse = $client->get('/jokes/random');
        $json = json_decode($apiResponse->getBody()->getContents(), true);

        $escapedJoke = htmlentities($json['value']);

        return new Response(<<<HTML
<!DOCTYPE html>
<html>
    <head><title>Une blague de Chuck !</title></head>
    <body>{$escapedJoke}</body>
</html>
HTML
        );
    }
}
