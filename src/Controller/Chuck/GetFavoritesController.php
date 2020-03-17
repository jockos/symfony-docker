<?php

declare(strict_types=1);


namespace App\Controller\Chuck;


use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class GetFavoritesController extends AbstractController
{
    /**
     * @Route(path="/favorites", name="my_favorites", methods={"GET"})
     *
     * @param Session $session
     * @return Response
     */
    public function __invoke(SessionInterface $session): Response
    {
        return $this->render('favorites.html.twig', ['favorites' => $session->get('favorites')]);
    }

//    public function initChuckMenu(RouterInterface $router): Response
//    {
//        $routes = [];
//        foreach ($router->getRouteCollection() as $route) {
//            if (!in_array(Request::METHOD_GET, $route->getMethods()) || !empty($route->compile()->getVariables())) {
//                continue;
//            }
//
//            $routes[] = $route;
//        }
//
//        return $this->render('chuck/_menu.html.twig', ['routes' => $routes]);
//    }
}
