<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;


class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie/{nomcat}", name="categorie")
     */
    public function categorie($nomcat)
    {
          
            $em = $this->getDoctrine()->getManager();

            $categorie = $em->getRepository(Categorie::class)->findOneBy([
                'nom' => $nomcat
            ]);
            

        return $this->render('categorie/categorie.html.twig', [
            'categorie'=> $categorie,
            'biens'=> $categorie->getBiens()


        ]);
    }
}
