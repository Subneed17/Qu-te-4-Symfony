<?php

namespace App\Controller;

use App\Entity\Program;
use App\Entity\Season;
use App\Entity\Episode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function index(): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        return $this->render(
            'program/index.html.twig',
            ['programs' => $programs]
        );
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

    //    /**
    //  * @Route("/{program<^[0-9]+$>}/seasons/{season<^[0-9]+$>}}, name="season_show")
    //  * @param Program $program
    //  * @param Season $season
    //  * @return Response
    //  */
    // public function showSeason(Program $program, Season $season) : Response 
    // {
    //     return $this->render('program/show_season.html.twig', [
    //         'program' => $program,
    //         'season' => $season
    //     ]);
    // }


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
}