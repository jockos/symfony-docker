<?php

declare(strict_types=1);


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $name = $request->get('name', 'Kévin');

        return new JsonResponse(['hello' => $name]);
        // return new Response(sprintf('Hello %s', htmlspecialchars($name)));
    }
}
