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
        if (!empty($user)) {
            $bien = $user->getBiens();
            $pret = $user->getPrets();
            dump($user);
    
            /*$em = $this->getDoctrine()->getManager();
    
            $users = $em->getRepository(User::class)->findAll();*/
    
            return $this->render('session/session.html.twig', [
                'user' => $user,
                'biens'=> $bien,
                'prets'=> $pret
            ]);
        }
        else {
            return $this->render('registration/login.html.twig');
        }
        
    }
}
