<?php

namespace App\Entity;

use App\Repository\BibliothequeplandepaieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothequeplandepaieRepository::class)
 */
class Bibliothequeplandepaie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Bibliothequepopulationplandepaie::class, inversedBy="bibliothequeplandepaies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bibliothequepopulationplandepaie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naturerub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $base;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taux;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coefficient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tauxsalarial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tauxpatronal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBibliothequepopulationplandepaie(): ?Bibliothequepopulationplandepaie
    {
        return $this->bibliothequepopulationplandepaie;
    }

    public function setBibliothequepopulationplandepaie(?Bibliothequepopulationplandepaie $bibliothequepopulationplandepaie): self
    {
        $this->bibliothequepopulationplandepaie = $bibliothequepopulationplandepaie;

        return $this;
    }

    public function getNaturerub(): ?string
    {
        return $this->naturerub;
    }

    public function setNaturerub(string $naturerub): self
    {
        $this->naturerub = $naturerub;

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

    public function getBase(): ?string
    {
        return $this->base;
    }

    public function setBase(string $base): self
    {
        $this->base = $base;

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

    public function getCoefficient(): ?string
    {
        return $this->coefficient;
    }

    public function setCoefficient(string $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getTauxsalarial(): ?string
    {
        return $this->tauxsalarial;
    }

    public function setTauxsalarial(string $tauxsalarial): self
    {
        $this->tauxsalarial = $tauxsalarial;

        return $this;
    }

    public function getTauxpatronal(): ?string
    {
        return $this->tauxpatronal;
    }

    public function setTauxpatronal(string $tauxpatronal): self
    {
        $this->tauxpatronal = $tauxpatronal;

        return $this;
    }
}
