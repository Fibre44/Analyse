<?php

namespace App\Entity;

use App\Repository\AbsenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbsenceRepository::class)
 */
class Absence
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
    private $motif;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motifdsn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $calendrier;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="absences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tauxheure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tauxjour;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

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

    public function getMotifdsn(): ?string
    {
        return $this->motifdsn;
    }

    public function setMotifdsn(string $motifdsn): self
    {
        $this->motifdsn = $motifdsn;

        return $this;
    }

    public function getCalendrier(): ?string
    {
        return $this->calendrier;
    }

    public function setCalendrier(string $calendrier): self
    {
        $this->calendrier = $calendrier;

        return $this;
    }

 
    public function getTauxabsence(): ?Tauxabsence
    {
        return $this->tauxabsence;
    }

    public function setTauxabsence(?Tauxabsence $tauxabsence): self
    {
        $this->tauxabsence = $tauxabsence;

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

    public function getTauxheure(): ?string
    {
        return $this->tauxheure;
    }

    public function setTauxheure(string $tauxheure): self
    {
        $this->tauxheure = $tauxheure;

        return $this;
    }

    public function getTauxjour(): ?string
    {
        return $this->tauxjour;
    }

    public function setTauxjour(string $tauxjour): self
    {
        $this->tauxjour = $tauxjour;

        return $this;
    }
}
