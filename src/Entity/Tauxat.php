<?php

namespace App\Entity;

use App\Repository\TauxatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TauxatRepository::class)
 */
class Tauxat
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
    private $coderisque;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tauxbureau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taux;

    /**
     * @ORM\Column(type="date")
     */
    private $dateapplication;

    /**
     * @ORM\ManyToOne(targetEntity=Etablissement::class, inversedBy="tauxats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etablissement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoderisque(): ?string
    {
        return $this->coderisque;
    }

    public function setCoderisque(string $coderisque): self
    {
        $this->coderisque = $coderisque;

        return $this;
    }

    public function getTauxbureau(): ?bool
    {
        return $this->tauxbureau;
    }

    public function setTauxbureau(bool $tauxbureau): self
    {
        $this->tauxbureau = $tauxbureau;

        return $this;
    }

    public function getTaux(): ?string
    {
        return $this->taux;
    }

    public function setTaux(string $taux): self
    {
        $this->taux = $taux;

        return $this;
    }

    public function getDateapplication(): ?\DateTimeInterface
    {
        return $this->dateapplication;
    }

    public function setDateapplication(\DateTimeInterface $dateapplication): self
    {
        $this->dateapplication = $dateapplication;

        return $this;
    }

    public function getEtablissement(): ?Etablissement
    {
        return $this->etablissement;
    }

    public function setEtablissement(?Etablissement $etablissement): self
    {
        $this->etablissement = $etablissement;

        return $this;
    }
}
