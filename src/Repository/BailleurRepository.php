<?php

namespace App\Repository;

use App\Entity\Bailleur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Bailleur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bailleur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bailleur[]    findAll()
 * @method Bailleur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BailleurRepository extends ServiceEntityRepository
{
  private $manager;
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Bailleur::class);
        $this->manager = $manager;
    }

    public function create($bailleur){
      $this->manager->persist($bailleur);
      $this->manager->flush();
    }

    public function delete($bailleur){
      $this->manager->remove($bailleur);
      $this->manager->flush();
    }
}
