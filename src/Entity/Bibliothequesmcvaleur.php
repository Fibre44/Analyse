<?php

namespace App\Entity;

use App\Repository\BibliothequesmcvaleurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothequesmcvaleurRepository::class)
 */
class Bibliothequesmcvaleur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coefficient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $qualification;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $niveau;

    /**
     * @ORM\Column(type="float")
     */
    private $smc;

    /**
     * @ORM\ManyToOne(targetEntity=Bibliothequesmcpopulation::class, inversedBy="bibliothequesmcvaleurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bibliothequesmcpopulation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etendu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoefficient(): ?string
    {
        return $this->coefficient;
    }

    public function setCoefficient(?string $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getQualification(): ?string
    {
        return $this->qualification;
    }

    public function setQualification(?string $qualification): self
    {
        $this->qualification = $qualification;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getSmc(): ?float
    {
        return $this->smc;
    }

    public function setSmc(float $smc): self
    {
        $this->smc = $smc;

        return $this;
    }

    public function getBibliothequesmcpopulation(): ?Bibliothequesmcpopulation
    {
        return $this->bibliothequesmcpopulation;
    }

    public function setBibliothequesmcpopulation(?Bibliothequesmcpopulation $bibliothequesmcpopulation): self
    {
        $this->bibliothequesmcpopulation = $bibliothequesmcpopulation;

        return $this;
    }

    public function getEtendu(): ?bool
    {
        return $this->etendu;
    }

    public function setEtendu(bool $etendu): self
    {
        $this->etendu = $etendu;

        return $this;
    }
}
