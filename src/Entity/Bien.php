<?php

namespace App\Entity;

use App\Repository\BienRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=BienRepository::class)
 */
class Bien
{
  protected $suplements;

  public function __construct(){
    $this->suplements = new ArrayCollection();
  }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\OneToOne(targetEntity=Locataire::class, inversedBy="bien", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $locataireId;

    /**
     * @ORM\Column(type="float")
     */
    private $loyerHC;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $charge;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $paiementCaf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEtage(): ?string
    {
        return $this->etage;
    }

    public function setEtage(string $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getLocataireId(): ?Locataire
    {
        return $this->locataireId;
    }

    public function setLocataireId(Locataire $locataireId): self
    {
        $this->locataireId = $locataireId;

        return $this;
    }

    public function getLoyerHC(): ?float
    {
        return $this->loyerHC;
    }

    public function setLoyerHC(float $loyerHC): self
    {
        $this->loyerHC = $loyerHC;

        return $this;
    }

    public function getCharge(): ?float
    {
        return $this->charge;
    }

    public function setCharge(?float $charge): self
    {
        $this->charge = $charge;

        return $this;
    }

    public function getPaiementCaf(): ?float
    {
        return $this->paiementCaf;
    }

    public function setPaiementCaf(?float $paiementCaf): self
    {
        $this->paiementCaf = $paiementCaf;

        return $this;
    }

    public function getSuplements():Collection{
      return $this->suplements;
    }
}
