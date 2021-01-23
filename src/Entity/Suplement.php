<?php

namespace App\Entity;

use App\Repository\SuplementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuplementRepository::class)
 */
class Suplement
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
    private $intitulet;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $BienId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitulet(): ?string
    {
        return $this->intitulet;
    }

    public function setIntitulet(string $intitulet): self
    {
        $this->intitulet = $intitulet;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getBienId(): ?int
    {
        return $this->BienId;
    }

    public function setBienId(int $BienId): self
    {
        $this->BienId = $BienId;

        return $this;
    }
}
