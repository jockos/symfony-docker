<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ChuckNorrisController extends AbstractController
{
    /**
     * @Route("/chuck")
     */
    public function random(Client $client): Response
    {
        $response = $client->get('/jokes/random');
        $json = json_decode($response->getBody(), true);

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
