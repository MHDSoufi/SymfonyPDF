<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Bailleur;
use App\Entity\Locataire;
use App\Entity\Bien;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<2;$i++){
          $bailleur = new Bailleur();
          $bailleur->setName('bailleur_'.$i)
                  ->setIntitulet('CTG quelque chose')
                  ->setAdresse('28 rue de metz')
                  ->setCodePostal('beuamont 63110');
          $manager->persist($bailleur);
        }

        for($i=0;$i<5;$i++){
          $locataire = new Locataire();
          $bien = new Bien();
          $bien->setType("Appartement")
               ->setEtage(rand(1,5))
               ->setAdresse("28 rue de metz Beaumont")
               ->setLoyerHC(530)
               ->setCharge(120);
          $manager->persist($bien);
          $locataire->setNom('locataire_'.$i)
                    ->setPrenom('prenom_'.$i)
                    ->setBien($bien);
          $manager->persist($locataire);
        }

        $manager->flush();
    }
}
