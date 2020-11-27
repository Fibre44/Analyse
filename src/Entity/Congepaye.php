<?php

namespace App\Entity;

use App\Repository\CongepayeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CongepayeRepository::class)
 */
class Congepaye
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
     * @ORM\Column(type="date")
     */
    private $finexercice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reliquat;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private $cpanciennete;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $cpsupplementaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $arrondi;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $arrondistc;

    /**
     * @ORM\ManyToOne(targetEntity=Etablissement::class, inversedBy="congepayes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etablissement;


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

    public function getFinexercice(): ?\DateTimeInterface
    {
        return $this->finexercice;
    }

    public function setFinexercice(\DateTimeInterface $finexercice): self
    {
        $this->finexercice = $finexercice;

        return $this;
    }

    public function getReliquat(): ?string
    {
        return $this->reliquat;
    }

    public function setReliquat(string $reliquat): self
    {
        $this->reliquat = $reliquat;

        return $this;
    }

    public function getCpanciennete(): ?string
    {
        return $this->cpanciennete;
    }

    public function setCpanciennete(string $cpanciennete): self
    {
        $this->cpanciennete = $cpanciennete;

        return $this;
    }

    public function getCpsupplementaire(): ?string
    {
        return $this->cpsupplementaire;
    }

    public function setCpsupplementaire(?string $cpsupplementaire): self
    {
        $this->cpsupplementaire = $cpsupplementaire;

        return $this;
    }

     public function getArrondi(): ?string
    {
        return $this->arrondi;
    }

    public function setArrondi(string $arrondi): self
    {
        $this->arrondi = $arrondi;

        return $this;
    }

    public function getArrondistc(): ?string
    {
        return $this->arrondistc;
    }

    public function setArrondistc(string $arrondistc): self
    {
        $this->arrondistc = $arrondistc;

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
