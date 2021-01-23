<?php

namespace App\Entity;

use App\Repository\LocataireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocataireRepository::class)
 */
class Locataire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToOne(targetEntity=Bien::class, mappedBy="locataireId", cascade={"persist", "remove"})
     */
    private $bien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getBien(): ?Bien
    {
        return $this->bien;
    }

    public function setBien(Bien $bien): self
    {
        // set the owning side of the relation if necessary
        if ($bien->getLocataireId() !== $this) {
            $bien->setLocataireId($this);
        }

        $this->bien = $bien;

        return $this;
    }
}
