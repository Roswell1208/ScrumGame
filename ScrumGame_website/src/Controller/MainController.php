<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Marque;
use App\Entity\Etat;
use App\Entity\Jeux;
use App\Form\JeuxType;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(): Response
    {
        $repoJeux = $this->getDoctrine()->getRepository(Jeux::class);
        $Jeux = $repoJeux->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'Jeux' => $Jeux
        ]);
    }

    /**
     * @Route("AjoutJeux", name="AjoutJeux")
     */
    public function AddJeux(Request $request, EntityManagerInterface $entityManager): Response
    {
        $Jeux = new Jeux();
        $form = $this->createForm(JeuxType::class, $Jeux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($Jeux);
            $entityManager->flush();
        }


        return $this->render('main/AddJeux.html.twig', [
            'controller_name' => 'BlockController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name = "JeuxDelete")
     * 
     * @return Response
     */
    public function JeuxDelete(Jeux $unJeux)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($unJeux);
        $em->flush();

        
        return $this->redirectToRoute('main');
    }


    /**
     * @Route("/consultMarques", name="consultMarques")
     */
    public function consultationMarques(): Response
    {
        $repoMarques = $this->getDoctrine()->getRepository(Marque::class);
        $marques = $repoMarques->findAll();

        return $this->render('main/consultationMarques.html.twig', [
            'controller_name' => 'MainController',
            'marques' => $marques
        ]);
    }

    /**
     * @Route("/consultEtats", name="consultEtats")
     */
    public function consultationEtats(): Response
    {
        $repoEtats = $this->getDoctrine()->getRepository(Etat::class);
        $etats = $repoEtats->findAll();

        return $this->render('main/consultationEtats.html.twig', [
            'controller_name' => 'MainController',
            'etats' => $etats
        ]);
    }
}
