<?php

namespace App\Controller;

use App\Entity\Userread;
use App\Form\UserreadType;
use App\Repository\UserreadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/userread")
 */
class UserreadController extends AbstractController
{
    /**
     * @Route("/", name="app_userread_index", methods={"GET"})
     */
    public function index(UserreadRepository $userreadRepository): Response
    {
        return $this->render('userread/index.html.twig', [
            'userreads' => $userreadRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_userread_new", methods={"GET", "POST"})
     */
    public function new(Request $request, UserreadRepository $userreadRepository): Response
    {
        $userread = new Userread();
        $form = $this->createForm(UserreadType::class, $userread);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userreadRepository->add($userread, true);

            return $this->redirectToRoute('app_userread_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('userread/new.html.twig', [
            'userread' => $userread,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_userread_show", methods={"GET"})
     */
    public function show(Userread $userread): Response
    {
        return $this->render('userread/show.html.twig', [
            'userread' => $userread,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_userread_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Userread $userread, UserreadRepository $userreadRepository): Response
    {
        $form = $this->createForm(UserreadType::class, $userread);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userreadRepository->add($userread, true);

            return $this->redirectToRoute('app_userread_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('userread/edit.html.twig', [
            'userread' => $userread,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_userread_delete", methods={"POST"})
     */
    public function delete(Request $request, Userread $userread, UserreadRepository $userreadRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userread->getId(), $request->request->get('_token'))) {
            $userreadRepository->remove($userread, true);
        }

        return $this->redirectToRoute('app_userread_index', [], Response::HTTP_SEE_OTHER);
    }
}
