<?php

namespace App\Controller;

use App\Entity\Wern;
use App\Form\WernType;
use App\Repository\WernRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/wern")
 */
class WernController extends AbstractController
{
    /**
     * @Route("/", name="app_wern_index", methods={"GET"})
     */
    public function index(WernRepository $wernRepository): Response
    {
        return $this->render('wern/index.html.twig', [
            'werns' => $wernRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_wern_new", methods={"GET", "POST"})
     */
    public function new(Request $request, WernRepository $wernRepository): Response
    {
        $wern = new Wern();
        $form = $this->createForm(WernType::class, $wern);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $wernRepository->add($wern, true);

            return $this->redirectToRoute('app_wern_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('wern/new.html.twig', [
            'wern' => $wern,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_wern_show", methods={"GET"})
     */
    public function show(Wern $wern): Response
    {
        return $this->render('wern/show.html.twig', [
            'wern' => $wern,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_wern_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Wern $wern, WernRepository $wernRepository): Response
    {
        $form = $this->createForm(WernType::class, $wern);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $wernRepository->add($wern, true);

            return $this->redirectToRoute('app_wern_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('wern/edit.html.twig', [
            'wern' => $wern,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_wern_delete", methods={"POST"})
     */
    public function delete(Request $request, Wern $wern, WernRepository $wernRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$wern->getId(), $request->request->get('_token'))) {
            $wernRepository->remove($wern, true);
        }

        return $this->redirectToRoute('app_wern_index', [], Response::HTTP_SEE_OTHER);
    }
}
