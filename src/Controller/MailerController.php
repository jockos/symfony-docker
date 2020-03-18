<?php

namespace App\Controller;

use App\Form\Type\ShareFavoritesMailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    /**
     * @Route("/email", methods={"POST"})
     */
    public function __invoke(Request $request, MailerInterface $mailer, SessionInterface $session): Response
    {
        $form = $this->createForm(ShareFavoritesMailType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $email = (new Email())
                ->from('hello@example.com')
                ->to($formData['to'])
                ->subject('Check thoses Chuck Norris Quote(s) !')
                ->html($this->renderView('mail/shareMyFavorites.html.twig', ['favorites' => $session->get('favorites'), 'from' => $formData['from']]))
            ;

            $mailer->send($email);

            $this->addFlash('success', 'Email was sent ! :)');
            return $this->forward(HomeController::class);
        }

        return $this->render('shareMyFavorites.html.twig', ['form' => $form->createView()]);
    }
}
