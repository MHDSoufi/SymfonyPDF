<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\BailleurRepository;
use App\Repository\LocataireRepository;
use App\Repository\BienRepository;

class LogicController extends AbstractController
{
    /**
     * @Route("/", name="locataire")
     */
    public function locataire(LocataireRepository $locataire): Response
    {
      return $this->render('locataire/locataire.html.twig',[
                            "locataires"=> $locataire->findAll()
      ]);
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
     * @Route("/bien", name="bien")
     */
    public function bien(BienRepository $bien): Response
    {
      return $this->render('bien/bien.html.twig',
                            ['biens'=>$bien->findAll()]);
    }

    /**
     * @Route("/quittance", name="quittance")
     */
    public function quittance(): Response
    {
      return $this->render('quittance/quittance.html.twig');
    }
}
