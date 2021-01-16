<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Bailleur;
use App\Entity\Locataire;

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
          $locataire->setNom('locataire_'.$i)
                    ->setPrenom('prenom_'.$i);
          $manager->persist($locataire);
        }

        $manager->flush();
    }
}
