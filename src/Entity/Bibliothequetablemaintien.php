<?php

namespace App\Entity;

use App\Repository\BibliothequetablemaintienRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothequetablemaintienRepository::class)
 */
class Bibliothequetablemaintien
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $anciennetedebut;

    /**
     * @ORM\Column(type="integer")
     */
    private $anciennetefin;

    /**
     * @ORM\Column(type="integer")
     */
    private $jourscarenceemployeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $dureemaximale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tauxmaintien;

    /**
     * @ORM\ManyToOne(targetEntity=Bibliothequecriteremaintien::class, inversedBy="bibliothequetablemaintiens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bibliothequecriteremaintien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnciennetedebut(): ?int
    {
        return $this->anciennetedebut;
    }

    public function setAnciennetedebut(int $anciennetedebut): self
    {
        $this->anciennetedebut = $anciennetedebut;

        return $this;
    }

    public function getAnciennetefin(): ?int
    {
        return $this->anciennetefin;
    }

    public function setAnciennetefin(int $anciennetefin): self
    {
        $this->anciennetefin = $anciennetefin;

        return $this;
    }

    public function getJourscarenceemployeur(): ?int
    {
        return $this->jourscarenceemployeur;
    }

    public function setJourscarenceemployeur(int $jourscarenceemployeur): self
    {
        $this->jourscarenceemployeur = $jourscarenceemployeur;

        return $this;
    }

    public function getDureemaximale(): ?int
    {
        return $this->dureemaximale;
    }

    public function setDureemaximale(int $dureemaximale): self
    {
        $this->dureemaximale = $dureemaximale;

        return $this;
    }

    public function getTauxmaintien(): ?string
    {
        return $this->tauxmaintien;
    }

    public function setTauxmaintien(string $tauxmaintien): self
    {
        $this->tauxmaintien = $tauxmaintien;

        return $this;
    }

    public function getBibliothequecriteremaintien(): ?Bibliothequecriteremaintien
    {
        return $this->bibliothequecriteremaintien;
    }

    public function setBibliothequecriteremaintien(?Bibliothequecriteremaintien $bibliothequecriteremaintien): self
    {
        $this->bibliothequecriteremaintien = $bibliothequecriteremaintien;

        return $this;
    }
}
