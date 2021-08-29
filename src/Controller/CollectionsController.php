<?php

namespace App\Controller;

use App\Entity\UserCollection;
use App\Form\UserCollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollectionsController extends AbstractController
{
    /**
     * @Route("/collections/{id}", name="collections.show")
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $collection = $this
            ->getDoctrine()
            ->getRepository(UserCollection::class)
            ->getCollectionFull($id);

        return $this->render('collections/show.html.twig', compact('collection'));
    }
}
