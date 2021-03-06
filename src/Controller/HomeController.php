<?php

namespace App\Controller;

use App\Entity\Item;
use App\Entity\UserCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $collections = $this
            ->getDoctrine()
            ->getRepository(UserCollection::class)
            ->getCollectionsWithMostItems();

        $items = $this
            ->getDoctrine()
            ->getRepository(Item::class)
            ->getItemsFull();


        return $this->render('home/index.html.twig', compact('collections', 'items'));
    }
}
