<?php

namespace App\Entity;

use App\Repository\ValeurzonelibrehrsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ValeurzonelibrehrsRepository::class)
 */
class Valeurzonelibrehrs
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
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity=Zonelibrehrs::class, inversedBy="valeurzonelibrehrs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $zone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getZone(): ?Zonelibrehrs
    {
        return $this->zone;
    }

    public function setZone(?Zonelibrehrs $zone): self
    {
        $this->zone = $zone;

        return $this;
    }
}
