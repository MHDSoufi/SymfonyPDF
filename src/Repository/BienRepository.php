<?php

namespace App\Repository;

use App\Entity\Bien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
/**
 * @method Bien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bien[]    findAll()
 * @method Bien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienRepository extends ServiceEntityRepository
{
  private $manager;
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Bien::class);
        $this->manager = $manager;
    }

    public function create(Bien $bien){
      $this->manager->persist($bien);
      $this->manager->flush();
      $id_bien = $bien->getId();
      if (count($bien->getSuplements())>0) {
        foreach ($bien->getSuplements() as $suplement) {
          $suplement->setBienId($id_bien);
          $this->manager->persist($suplement);
          $this->manager->flush();
        }
      }
    }
}
