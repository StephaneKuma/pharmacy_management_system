<?php

namespace App\Controller;

use App\Entity\Drug;
use App\Form\DrugType;
use App\Repository\DrugRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/drug")
 */
class DrugController extends AbstractController
{
    /**
     * @Route("/", name="drug_index", methods={"GET"})
     * @param DrugRepository $drugRepository
     * @return Response
     */
    public function index(DrugRepository $drugRepository): Response
    {
        return $this->render('drug/index.html.twig', [
            'drugs' => $drugRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="drug_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $drug = new Drug();
        $form = $this->createForm(DrugType::class, $drug);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($drug);
            $entityManager->flush();

            return $this->redirectToRoute('drug_index');
        }

        return $this->render('drug/new.html.twig', [
            'drug' => $drug,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="drug_show", methods={"GET"})
     * @param Drug $drug
     * @return Response
     */
    public function show(Drug $drug): Response
    {
        return $this->render('drug/show.html.twig', [
            'drug' => $drug,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="drug_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Drug $drug
     * @return Response
     */
    public function edit(Request $request, Drug $drug): Response
    {
        $form = $this->createForm(DrugType::class, $drug);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('drug_index');
        }

        return $this->render('drug/edit.html.twig', [
            'drug' => $drug,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="drug_delete", methods={"DELETE"})
     * @param Request $request
     * @param Drug $drug
     * @return Response
     */
    public function delete(Request $request, Drug $drug): Response
    {
        if ($this->isCsrfTokenValid('delete'.$drug->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($drug);
            $entityManager->flush();
        }

        return $this->redirectToRoute('drug_index');
    }
}
