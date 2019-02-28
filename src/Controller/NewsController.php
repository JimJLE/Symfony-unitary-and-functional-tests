<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * @Route("/", name="news_index")
     */
    public function index(): Response
    {
        return $this->render('news/index.html.twig', [
            'collection' => $this->newsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/news/{slug}", name="news_item")
     */
    public function item(string $slug): Response
    {
        if (null === $news = $this->newsRepository->findOneBySlug($slug)) {
            throw $this->createNotFoundException();
        }

        return $this->render('news/item.html.twig', ['item' => $news]);
    }
}