<?php

namespace App\Controller;

use App\Entity\Program;
use App\Entity\Season;
use App\Entity\Episode;
use App\Form\ProgramType;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/programs", name="program_")
 */
class ProgramController extends AbstractController
{
    /**
     * Show all rows from Program’s entity
     *
     * @Route("/", name="index")
     * @return Response A response instance
     */
    public function index(ProgramRepository $programRepository): Response
    {
        return $this->render('program/index.html.twig', [
            'programs' => $programRepository->findAll(),
        ]);
    }


    /**
     * The controller for the category add form
     * Display the form or deal with it
     *
     * @Route("/new", name="new")
     */
    public function new(Request $request): Response
    {
       // Create a new Program Object
       $program = new Program();
       // Create the associated Form
       $form = $this->createForm(ProgramType::class, $program);
       // Get data from HTTP request
       $form->handleRequest($request);
       // Was the form submitted ?
       if ($form->isSubmitted() && $form->isValid()) {
           // Deal with the submitted data
           // Get the Entity Manager
           $entityManager = $this->getDoctrine()->getManager();
           // Persist Category Object
           $entityManager->persist($program);
           // Flush the persisted object
           $entityManager->flush();
           // Finally redirect to categories list
           return $this->redirectToRoute('program_index');
        }
        // Render the form
        return $this->render('program/new.html.twig', ["form" => $form->createView()]);
    }

    /**
     * @Route("/show/{id<^[0-9]+$>}", name="show")
     * @param Program $program
     * @return Response
     */
    public function show(Program $program): Response
    {
        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }

    
    /**
     * @route("/{program<^[0-9]+$>}/seasons/{season<^[0-9]+$>}}", methods={"GET"}, name="season_show")
     * @param Program $program
     * @param Season $season
     * @return Response
     */
    public function showSeason(Program $program, Season $season): response
    {
        return $this->render('program/show_season.html.twig', [
            'program' => $program,
            'season' => $season
        ]);
    }


     /**
     * @route("/{program}/seasons/{season}/episodes/{episode}", name="episode_show")
     * @param Program $program
     * @param Season $season
     * @param Episode $episode
     * @return Response
     */
    public function showEpisode(Program $program, Season $season, Episode $episode) : Response 
    {
        return $this->render('program/episode_show.html.twig', [
            'program' => $program,
            'season' => $season,
            'episode' => $episode
        ]);

    }
    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Program $program): Response
    {
        $form = $this->createForm(programType::class, $program);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('program_index');
        }

        return $this->render('program/edit.html.twig', [
            'program' => $program,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request,Program $program): Response
    {
        if ($this->isCsrfTokenValid('delete'.$program->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($program);
            $entityManager->flush();
        }

        return $this->redirectToRoute('program_index');
    }
}