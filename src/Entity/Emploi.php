<?php

namespace App\Entity;

use App\Repository\EmploiRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmploiRepository::class)
 */
class Emploi
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
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="emplois")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeemploi;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSociete(): ?Societe
    {
        return $this->societe;
    }

    public function setSociete(?Societe $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getCodeemploi(): ?string
    {
        return $this->codeemploi;
    }

    public function setCodeemploi(string $codeemploi): self
    {
        $this->codeemploi = $codeemploi;

        return $this;
    }
}
