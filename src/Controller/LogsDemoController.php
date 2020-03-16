<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogsDemoController extends AbstractController
{
    /**
     * @Route("/logs")
     */
    public function demoAction(LoggerInterface $logger): Response
    {
        // Niveaux disponibles (du plus sérieux au plus anodin) :
        // emergency, alert, critical, error, warning, notice, info, debug
        $logger->info('The current class is {class}.', ['class' => __CLASS__]);

        return new Response('<body>Un log a été ajouté.</body>');
    }
}
