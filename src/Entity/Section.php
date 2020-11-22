<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionRepository::class)
 */
class Section
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
    private $codesection;

    /**
     * @ORM\ManyToOne(targetEntity=Axe::class, inversedBy="sections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $axe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodesection(): ?string
    {
        return $this->codesection;
    }

    public function setCodesection(string $codesection): self
    {
        $this->codesection = $codesection;

        return $this;
    }

    public function getAxe(): ?Axe
    {
        return $this->axe;
    }

    public function setAxe(?Axe $axe): self
    {
        $this->axe = $axe;

        return $this;
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
}
