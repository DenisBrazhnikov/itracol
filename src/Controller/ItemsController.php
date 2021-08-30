<?php

namespace App\Controller;

use App\Entity\Item;
use App\Entity\UserCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemsController extends AbstractController
{
    /**
     * @Route("/items/{id}", name="items.show")
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $item = $this
            ->getDoctrine()
            ->getRepository(Item::class)
            ->getItemFull($id);

        return $this->render('items/show.html.twig', compact('item'));
    }
}
