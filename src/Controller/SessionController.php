<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    /**
     * @Route("/session", name="session")
     */
    public function user()
    {
        $user = $this->getuser();
        dump($user);
        /*$em = $this->getDoctrine()->getManager();

        $users = $em->getRepository(User::class)->findAll();*/

        return $this->render('session/session.html.twig', [
            'user' => $user
        ]);
    }
}
