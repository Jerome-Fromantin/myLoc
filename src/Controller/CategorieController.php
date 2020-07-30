<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;


class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie/{nom}", name="categorie")
     */
    public function categorie($nom)
    {
          
            $em = $this->getDoctrine()->getManager();

            $categorie = $em->getRepository(Categorie::class)->findOneBy([
                'nom'=>$nom
            ]);
            

        return $this->render('categorie/categorie.html.twig', [
            'categorie'=> $categorie,
            'biens'=> $categorie->getBiens()


        ]);
    }
}
