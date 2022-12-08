<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Marque;
use App\Form\AddMarqueType;
use App\Entity\Etat;
use App\Form\AddEtatType;

use App\Entity\Jeux;

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


    /**
     * @Route("AjoutMarque", name="AjoutMarque")
     */
    public function AddMarque(Request $request, EntityManagerInterface $entityManager): Response
    {
        $marque = new Marque();
        $form = $this->createForm(AddMarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($marque);
            $entityManager->flush();
        }


        return $this->render('main/addMarque.html.twig', [
            'controller_name' => 'MainController',
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("AjoutEtat", name="AjoutEtat")
     */
    public function AddEtat(Request $request, EntityManagerInterface $entityManager): Response
    {
        $etat = new Etat();
        $form = $this->createForm(AddEtatType::class, $etat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($etat);
            $entityManager->flush();
        }


        return $this->render('main/addEtat.html.twig', [
            'controller_name' => 'MainController',
            'form' => $form->createView()
        ]);
    }
    


    /**
     * @Route("/marqueDelete/{id}", name = "marqueDelete")
     * 
     * @return Response
     */
    public function marqueDelete(Marque $uneMarque)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($uneMarque);
        $em->flush();

        
        return $this->redirectToRoute('consultMarques');
    }

    /**
     * @Route("/etatDelete/{id}", name = "etatDelete")
     * 
     * @return Response
     */
    public function etatDelete(Etat $unEtat)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($unEtat);
        $em->flush();

        
        return $this->redirectToRoute('consultEtats');
    }
}
