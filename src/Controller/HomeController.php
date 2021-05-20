<?php

namespace App\Controller;
use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Studio;
use App\Repository\ActorRepository;
use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use App\Repository\StudioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    public function __construct(MovieRepository $repomovie, GenreRepository  $repogenre, ActorRepository $repoactor, StudioRepository  $repoStudio){
        $this->repomovie = $repomovie;
        $this->repogenre = $repogenre;
        $this->repoactor = $repoactor;
        $this->repoStudio = $repoStudio;

    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $movies = $this->repomovie->findAll();
        $genres = $this->repogenre->findAll();
        return $this->render('home/index.html.twig', [
            'movies' => $movies,
            'genres' => $genres
        ]);
    }


    /**
     * @Route("/genre", name="genre")
     */
    public function genre(): Response
    {
        $genres = $this->repogenre->findAll();
        return $this->render('home/genre.html.twig',[
            'genres'=>$genres
        ]);
    }
    /**
     * @Route("/showBygenre/{id}", name="showBygenre")
     */
    public function showBygenre(Genre $genre): Response
    {
        if(!$genre)
            return $this->redirectToRoute('home');
        return $this->render("home/index.html.twig",[
            'movies'=>$genre->getMovies(),
        ]);
    }

    /**
     * @Route("/actor", name="actor")
     */
    public function actor(): Response
    {
        $actor = $this->repoactor->findAll();
        return $this->render('home/actor.html.twig',[
            'actors'=>$actor
        ]);
    }
    /**
     * @Route("/showByActor/{id}", name="showByActor")
     */
    public function showByActor(Actor $actor): Response
    {
        if(!$actor)
            return $this->redirectToRoute('home');
        return $this->render("home/index.html.twig",[
            'movies'=>$actor->getMovies(),
        ]);
    }

    /**
     * @Route("/studio", name="studio")
     */
    public function studio(): Response
    {
        $studio = $this->repoStudio->findAll();
        return $this->render('home/studio.html.twig',[
            'studios'=>$studio
        ]);
    }
    /**
     * @Route("/showByStudio/{id}", name="showByActor")
     */
    public function showByStudio(Studio $studio): Response
    {
        if(!$studio)
            return $this->redirectToRoute('home');
        return $this->render("home/index.html.twig",[
            'movies'=>$studio->getMovies(),
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {

        return $this->render('home/about.html.twig');
    }
}
