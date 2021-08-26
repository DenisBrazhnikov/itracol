<?php

namespace App\Controller\User;

use App\Entity\UserCollection;
use App\Form\ItemType;
use App\Form\UserCollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollectionsController extends AbstractController
{
    /**
     * @Route("/user/collections", name="user_collections")
     */
    public function index(): Response
    {
        $collections = $this->getUser()->getCollections();

        return $this->render('user/collections/index.html.twig', compact('collections'));
    }

    /**
     * @Route("/user/collections/create", name="user_collections.create")
     */
    public function create(Request $request): Response
    {
        $collection = new UserCollection();

        $form = $this->createForm(UserCollectionType::class, $collection);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $collection->setUser($this->getUser());

            $em->persist($collection);
            $em->flush();

            return $this->redirectToRoute('user_collections');
        }

        return $this->render('user/collections/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/collections/{id}/edit", name="user_collections.edit")
     */
    public function edit(int $id, Request $request): Response
    {
        $collection = $this->getDoctrine()
            ->getRepository(UserCollection::class)
            ->findOneBy(['id' => $id, 'user' => $this->getUser()]);

        if (!$collection)
            throw $this->createNotFoundException('The collection does not exist');

        $form = $this->createForm(UserCollectionType::class, $collection);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($collection);
            $em->flush();

            return $this->redirectToRoute('user_collections');
        }

        return $this->render('user/collections/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/collections/{id}/editItems", name="user_collections.editItems")
     */
    public function editItems(int $id, Request $request): Response
    {
        $collection = $this->getDoctrine()
            ->getRepository(UserCollection::class)
            ->findOneBy(['id' => $id, 'user' => $this->getUser()]);

        if (!$collection)
            throw $this->createNotFoundException('The collection does not exist');

        $form = $this->createForm(UserCollectionType::class, $collection);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($collection);
            $em->flush();

            return $this->redirectToRoute('user_collections');
        }

        return $this->render('user/collections/edit-items.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
