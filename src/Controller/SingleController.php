<?php

namespace App\Controller;

use App\Entity\Biens;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SingleController extends AbstractController
{
    /**
     * @Route("/single/{nom}", name="single")
     */
    public function single($nom)
    {
        $em = $this->getDoctrine()->getManager();

        $bien = $em->getRepository(Biens::class)->findOneBy([
            'nom' => $nom
        ]);

        return $this->render('single/single.html.twig', [
            'bien'=> $bien
        ]);
    }
}
