<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder)

    {
        $user = new User;

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);

            $user->setPoints(0);

            $newUser = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            $em->flush();
        }


        return $this->render('registration/registration.html.twig', [
            'form' => $form->createView(),
            ]);
    }
    /**
     * @Route("/login", name="usr_login")
     */
    public function login()
    {
        return $this->render('registration/login.html.twig');
    }
    /**
     * @Route("/logout", name="usr_logout")
     */
    public function logout()
    {
        
    }
}
