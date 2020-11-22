<?php

namespace App\Entity;

use App\Repository\TablemaintienRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TablemaintienRepository::class)
 */
class Tablemaintien
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
     * @ORM\ManyToOne(targetEntity=Criteremaintien::class, inversedBy="tablemaintiens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $criteremaintien;

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

    public function getCriteremaintien(): ?Criteremaintien
    {
        return $this->criteremaintien;
    }

    public function setCriteremaintien(?Criteremaintien $criteremaintien): self
    {
        $this->criteremaintien = $criteremaintien;

        return $this;
    }
}
