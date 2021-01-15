<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\BailleurRepository;

class LogicController extends AbstractController
{
    /**
     * @Route("/", name="locataire")
     */
    public function locataire(): Response
    {
      return $this->render('locataire/locataire.html.twig');
    }

    /**
     * @Route("/bailleur", name="bailleur")
     */
    public function bailleur(BailleurRepository $bailleur): Response
    {
      $bailleurs = $bailleur->findAll();
      return $this->render('bailleur/bailleur.html.twig',
                            ['bailleurs'=>$bailleurs]);
    }

    /**
     * @Route("/quittance", name="quittance")
     */
    public function quittance(): Response
    {
      return $this->render('quittance/quittance.html.twig');
    }
}
