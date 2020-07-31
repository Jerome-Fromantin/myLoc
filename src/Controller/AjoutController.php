<?php

namespace App\Controller;

use App\Entity\Biens;
use App\Entity\User;
use App\Form\AjoutType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AjoutController extends AbstractController
{
    /**
     * @Route("/session/Ajout", name="Ajout")
     */
    public function new(Request $request)
    {
        $newBien = new Biens;
       
        $form = $this->createForm(AjoutType::class, $newBien);
        $user = $this->getuser();


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $newBien = $form->getData();
            $newBien->setProprio($user);
            

            $em = $this->getDoctrine()->getManager();
            $em->persist($newBien);
            $em->flush();
            
            return $this->redirect($this->generateUrl('index'));
            
        }

        return $this->render('ajout/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
