<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExceptionController extends AbstractController
{
    /**
     * @Route("/exception")
     */
    public function exceptionAction(): Response
    {
        // Ça marche pour toutes les exceptions, mais aussi pour les erreurs PHP
        throw new \RuntimeException('Houston, on a un problème.');
    }
}
