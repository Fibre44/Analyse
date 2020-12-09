<?php

namespace App\Entity;

use App\Repository\CompteurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteurRepository::class)
 */
class Compteur
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
    private $libelle;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $cumulacquis;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $cumulpris;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateraz;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rubriqueheures;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rubriquejours;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="compteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCumulacquis(): ?string
    {
        return $this->cumulacquis;
    }

    public function setCumulacquis(string $cumulacquis): self
    {
        $this->cumulacquis = $cumulacquis;

        return $this;
    }

    public function getCumulpris(): ?string
    {
        return $this->cumulpris;
    }

    public function setCumulpris(string $cumulpris): self
    {
        $this->cumulpris = $cumulpris;

        return $this;
    }

    public function getDateraz(): ?string
    {
        return $this->dateraz;
    }

    public function setDateraz(string $dateraz): self
    {
        $this->dateraz = $dateraz;

        return $this;
    }

    public function getRubriqueheures(): ?string
    {
        return $this->rubriqueheures;
    }

    public function setRubriqueheures(string $rubriqueheures): self
    {
        $this->rubriqueheures = $rubriqueheures;

        return $this;
    }

    public function getRubriquejours(): ?string
    {
        return $this->rubriquejours;
    }

    public function setRubriquejours(string $rubriquejours): self
    {
        $this->rubriquejours = $rubriquejours;

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
