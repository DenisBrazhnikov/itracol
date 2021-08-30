<?php

namespace App\Controller\User;

use App\Entity\Item;
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

            return $this->redirectToRoute('collections.show', ['id' => $collection->getId()]);
        }

        return $this->render('user/collections/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/collections/{id}/edit", name="user_collections.edit")
     * @param UserCollection $collection
     * @param Request $request
     * @return Response
     */
    public function edit(UserCollection $collection, Request $request): Response
    {
        $this->checkPermissions($collection);

        $form = $this->createForm(UserCollectionType::class, $collection);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($collection);
            $em->flush();

            return $this->redirectToRoute('user_collections');
        }

        return $this->render('user/collections/edit.html.twig', [
            'collection' => $collection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/collections/{id}/editItems", name="user_collections.editItems")
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function editItems(int $id, Request $request): Response
    {
        $collection = $this
            ->getDoctrine()
            ->getRepository(UserCollection::class)
            ->getCollectionFull($id);

        $this->checkPermissions($collection);

        $form = $this->createForm(ItemType::class, new Item(), compact('collection'));

        return $this->render('user/collections/edit-items.html.twig', [
            'collection' => $collection,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/collections/{id}/addItem", name="user_collections.addItem", methods={"POST"})
     * @param UserCollection $collection
     * @param Request $request
     * @return Response
     */
    public function addItem(UserCollection $collection, Request $request): Response
    {
        $this->checkPermissions($collection);

        $item = new Item();

        $form = $this->createForm(ItemType::class, $item, compact('collection'));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $item->setCollection($collection);

            $em->persist($item);
            $em->flush();
        }

        return $this->redirectToRoute('user_collections.editItems', [
            'id' => $collection->getId()
        ]);
    }

    /**
     * @Route("/user/collections/{id}/removeItem", name="user_collections.removeItem", methods={"POST"})
     * @param UserCollection $collection
     * @param Request $request
     * @return Response
     */
    public function removeItem(UserCollection $collection, Request $request): Response
    {
        $this->checkPermissions($collection);

        $item = $this->getDoctrine()->getRepository(Item::class)->find($request->get('item_id'));

        if (!$item) {
            throw $this->createNotFoundException('No such item');
        }

        if ($item->getCollection() !== $collection)
            throw $this->createAccessDeniedException('You have no permission to edit this collection');

        $em = $this->getDoctrine()->getManager();
        $em->remove($item);
        $em->flush();

        return $this->redirectToRoute('user_collections.editItems', [
            'id' => $collection->getId()
        ]);
    }

    private function checkPermissions(UserCollection $collection)
    {
        if ($collection->getUser() !== $this->getUser())
            throw $this->createAccessDeniedException('You have no permission to edit this collection');
    }
}
