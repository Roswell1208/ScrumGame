<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Marque;
use App\Entity\Etat;

use App\Entity\Console;
use App\Form\ConsoleType;

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
     * @Route("/consultConsole", name="consultConsole")
     */
    public function consultationConsole(): Response
    {
        $repoConsole = $this->getDoctrine()->getRepository(Console::class);
        $Console = $repoConsole->findAll();

        return $this->render('console/console.html.twig', [
            'controller_name' => 'MainController',
            'Console' => $Console
        ]);
    }

    /**
     * @Route("/AjoutConsole", name="AjoutConsole")
     */
    public function ajoutConsole(Request $request, EntityManagerInterface $entityManager): Response
    {
        $Console = new Console();
        $form = $this->createForm(ConsoleType::class, $Console);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($Console);
            $entityManager->flush();
        }

        return $this->render('console/ajoutConsole.html.twig', [
            'controller_name' => 'BlockController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="DeleteConsole")
     * 
     * @return Response
     */
    public function deleteConsole(Console $uneConsole)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($uneConsole);
        $em->flush();

        return $this->redirectToRoute('consultConsole');
    }
}
