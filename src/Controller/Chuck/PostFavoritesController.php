<?php

declare(strict_types=1);


namespace App\Controller\Chuck;


use App\Controller\HomeController;
use App\Entity\Favorite;
use App\Form\Type\FavoriteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PostFavoritesController extends AbstractController
{
    /**
     * @Route(path="/favorites", methods={"POST"})
     * @return Response
     */
    public function __invoke(Request $request, SessionInterface $session): Response
    {
        $favoriteData = $request->get('favoriteData', []);
        $form = $this->createForm(FavoriteType::class);

        // Pre populate the fields
        if (!empty($favoriteData)) {
            $favorite = new Favorite();
            $favorite->setQuote($favoriteData['quote']);
            $favorite->setLink($favoriteData['link']);

            $form->setData($favorite);
        }

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $favorites = $session->get('favorites', []);
            $fav = $form->getData();

            if (!in_array($fav, $favorites, true)) {
                $favorites[] = $fav;
            }

            $session->set('favorites', $favorites);

            return $this->redirectToRoute('app_home__invoke');

        }

        return $this->render('postFavorite.html.twig', ['form' => $form->createView()]);
    }
}
