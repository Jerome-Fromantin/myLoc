<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;


class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie/{id}", name="categorie")
     */
    public function categorie(int $id)
    {
          
            $em = $this->getDoctrine()->getManager();

            $categorie = $em->getRepository(Categorie::class)->find($id);
            

        return $this->render('categorie/index.html.twig', [
            'categorie'=> $categorie,
            'biens'=> $categorie->getBiens()


        ]);
    }
}
