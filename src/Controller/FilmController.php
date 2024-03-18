<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Reservation;

use App\Entity\Horaire;
use App\Form\FilmFormType;
use App\Form\ReservationType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use App\Repository\FilmRepository;

class FilmController extends AbstractController
{

    #[Route("/films", name: "films_index")]
    public function index(FilmRepository $filmRepository): Response
    {
        $films = $filmRepository->findAll();

        return $this->render('film/index.html.twig', [
            'films' => $films,
        ]);
    }

    #[Route("/addmovie", name: "film_new")]
    public function new(Request $request, EntityManagerInterface $entityManager, Security $security): Response
    {
        $cinema = $security->getUser();

        $film = new Film();

        $horaire = new Horaire();
        $horaire->setHeure(new \DateTime());
        $film->addHoraire($horaire);

        $form = $this->createForm(FilmFormType::class, $film, ['cinema' => $cinema]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salles = $form->get('salles')->getData();

            foreach ($salles as $salle) {
                $film->addSalle($salle);
            }

            $entityManager->persist($film);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('film/new.html.twig', [
            'filmForm' => $form->createView(),
        ]);
    }

   
}
