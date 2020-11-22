<?php

namespace App\Entity;

use App\Repository\ProvisionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProvisionRepository::class)
 */
class Provision
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $calcul;

    /**
     * @ORM\Column(type="boolean")
     */
    private $comptabilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $extourne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $periodicite;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="provisions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

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

    public function getCalcul(): ?string
    {
        return $this->calcul;
    }

    public function setCalcul(string $calcul): self
    {
        $this->calcul = $calcul;

        return $this;
    }

    public function getComptabilite(): ?bool
    {
        return $this->comptabilite;
    }

    public function setComptabilite(bool $comptabilite): self
    {
        $this->comptabilite = $comptabilite;

        return $this;
    }

    public function getExtourne(): ?string
    {
        return $this->extourne;
    }

    public function setExtourne(string $extourne): self
    {
        $this->extourne = $extourne;

        return $this;
    }

    public function getPeriodicite(): ?string
    {
        return $this->periodicite;
    }

    public function setPeriodicite(string $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

    public function getSociete(): ?Societe
    {
        return $this->societe;
    }

    public function setSociete(?Societe $societe): self
    {
        $this->societe = $societe;

        return $this;
    }
}
