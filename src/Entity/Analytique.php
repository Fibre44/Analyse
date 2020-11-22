<?php

namespace App\Entity;

use App\Repository\AnalytiqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnalytiqueRepository::class)
 */
class Analytique
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
    private $axe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $section;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="analytiques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAxe(): ?string
    {
        return $this->axe;
    }

    public function setAxe(string $axe): self
    {
        $this->axe = $axe;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): self
    {
        $this->section = $section;

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
