<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HoraireRepository::class)
 */
class Horaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Calendrier::class, inversedBy="horaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $calendrier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jour;

    /**
     * @ORM\Column(type="time")
     */
    private $matindebut;

    /**
     * @ORM\Column(type="time")
     */
    private $matinfin;

  

    /**
     * @ORM\Column(type="time")
     */
    private $apfin;

    /**
     * @ORM\Column(type="time")
     */
    private $apdebut;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCalendrier(): ?Calendrier
    {
        return $this->calendrier;
    }

    public function setCalendrier(?Calendrier $calendrier): self
    {
        $this->calendrier = $calendrier;

        return $this;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getMatindebut(): ?\DateTimeInterface
    {
        return $this->matindebut;
    }

    public function setMatindebut(\DateTimeInterface $matindebut): self
    {
        $this->matindebut = $matindebut;

        return $this;
    }

    public function getMatinfin(): ?\DateTimeInterface
    {
        return $this->matinfin;
    }

    public function setMatinfin(\DateTimeInterface $matinfin): self
    {
        $this->matinfin = $matinfin;

        return $this;
    }

  
    public function getApfin(): ?\DateTimeInterface
    {
        return $this->apfin;
    }

    public function setApfin(\DateTimeInterface $apfin): self
    {
        $this->apfin = $apfin;

        return $this;
    }

    public function getApdebut(): ?\DateTimeInterface
    {
        return $this->apdebut;
    }

    public function setApdebut(\DateTimeInterface $apdebut): self
    {
        $this->apdebut = $apdebut;

        return $this;
    }

 
}
