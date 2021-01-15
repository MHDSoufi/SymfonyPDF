<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\BailleurRepository;
use App\Form\BailleurType;
use App\Entity\Bailleur;

class BailleurController extends AbstractController
{
  /**
   * [private description]
   * @var [type]
   */
  private $bailleurRepository;
  /**
   * [__construct description]
   * @param BailleurRepository $bailleurRepository [description]
   */
  public function __construct(BailleurRepository $bailleurRepository){
    $this->bailleurRepository = $bailleurRepository;
  }
    /**
     * @Route("/bailleur/edit/{id}", name="bailleur_edit")
     */
    public function edit($id): Response
    {
      $bailleur = $this->bailleurRepository->find($id);
        return $this->render('bailleur/edit.html.twig', [
            'bailleur' => $bailleur,
        ]);
    }

    /**
     * creer un bailleur
     * @Route("/billeur/new", name="bailleur_create")
     * @Route("/bailleur/update/{id}", name="bailleur_update")
     */
    public function bailleurForm($id=0, Request $req ): Response
    {
      $bailleur = $this->bailleurRepository->find($id);
      $modif = false;
      if (!isset($bailleur)) {
        $bailleur = new Bailleur();
        $modif = true;
      }
      $form = $this->createForm(BailleurType::class, $bailleur);
      $form->handleRequest($req);
      if ($form->isSubmitted() && $form->isValid()) {
        $this->bailleurRepository->create($bailleur);
        $bailleurs = $this->bailleurRepository->findAll();
        return $this->redirectToRoute('bailleur',
                              ['bailleurs'=>$bailleurs]);
      }
      return $this->render('bailleur/add.html.twig', [
              "form" => $form->createView(),
              "modif" => $modif,
      ]);
    }

    /**
     * @Route("/bailleur/delete/{id}", name="bailleur_delete")
     */
    public function delete($id){
      $bailleur = $this->bailleurRepository->find($id);
      $this->bailleurRepository->delete($bailleur);
      $bailleurs = $this->bailleurRepository->findAll();
      return $this->redirectToRoute('bailleur',
                            ['bailleurs'=>$bailleurs]);
    }
}
