<?php

namespace App\Controller;

use App\Entity\Pret;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\PretType;
use App\Entity\Biens;
use App\Entity\User;



class PretController extends AbstractController
{
    /**
     * @Route("/pret/{nom}", name="pret")
     */
    public function newPret(Request $request,$nom)
    {  
        $user = $this->getuser(); 

        if (!empty($user)) {

            $em = $this->getDoctrine()->getManager();

            $bien = $em->getRepository(Biens::class)->findOneBy([
                'nom' => $nom
            ]);
            $proprio = $bien->getProprio();

            $points = $proprio->getPoints();
            $point = $points + 1;

            $getPrets = $bien -> getPrets();

            $datePretDebut = [];
            $datePretFin = [];
            $check ="Validation des dates";

            foreach($getPrets as $getPret){

                $getDateDebuts = $getPret-> getDateDebut();
            

                array_push($datePretDebut, $getDateDebuts);


                $getDateFins = $getPret-> getDateFin();


                array_push($datePretFin, $getDateFins);

            }


            $newPret = new Pret;

            $form = $this->createForm(PretType::class, $newPret);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                
                $newPret = $form->getData();

                $newPret->setEmprunteur($user);
                $newPret->setBien($bien);
                $proprio->setPoints($point);

                
                $em = $this->getDoctrine()->getManager();
                $em->persist($newPret);
                $em->flush();

                
                return $this->redirect($this->generateUrl('index'));
                
            }

            return $this->render('pret/pret.html.twig', [
                'form' => $form->createView(),
                'bien'=> $bien,
                'dateDebuts' => $datePretDebut,
                'dateFins' => $datePretFin,
                'check' => $check
            ]);
        }
        else {
            return $this->render('registration/login.html.twig');
        }
        
    }
}
