<?php

namespace App\Repository;

use App\Entity\Locataire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Locataire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Locataire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Locataire[]    findAll()
 * @method Locataire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocataireRepository extends ServiceEntityRepository
{
  private $manager;
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Locataire::class);
        $this->manager = $manager;
    }

    public function create(Locataire $locataire){
      $this->manager->persist($locataire);
      $this->manager->flush();
    }

    /**
     * [delete description]
     * @param  String $id [id locataire]
     * @return array       [of locataires]
     */
    public function delete (String $id) : array {
      $locataire = $this->find($id);
      $this->manager->remove($locataire);
      $this->manager->flush();
      return  $this->findAll();
    }

}
