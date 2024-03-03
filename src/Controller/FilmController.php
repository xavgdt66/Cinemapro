<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class FilmController extends AbstractController
{

    #[Route("/addmovie", name: "film_new")]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $film = new Film();
        $form = $this->createForm(FilmFormType::class, $film);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($film);
            $entityManager->flush(); 

            return $this->redirectToRoute('app_home');
        }
        return $this->render('film/new.html.twig', [
            'filmForm' => $form,
        ]);
    }  

 
}