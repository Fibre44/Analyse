<?php

namespace App\Entity;

use App\Repository\CriteremaintienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CriteremaintienRepository::class)
 */
class Criteremaintien
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
    private $absence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $populatin;

    /**
     * @ORM\ManyToOne(targetEntity=Conventioncollective::class, inversedBy="criteremaintiens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ccn;

    /**
     * @ORM\OneToMany(targetEntity=Tablemaintien::class, mappedBy="criteremaintien", orphanRemoval=true)
     */
    private $tablemaintiens;

    public function __construct()
    {
        $this->tablemaintiens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbsence(): ?string
    {
        return $this->absence;
    }

    public function setAbsence(string $absence): self
    {
        $this->absence = $absence;

        return $this;
    }

    public function getPopulatin(): ?string
    {
        return $this->populatin;
    }

    public function setPopulatin(string $populatin): self
    {
        $this->populatin = $populatin;

        return $this;
    }

    public function getCcn(): ?Conventioncollective
    {
        return $this->ccn;
    }

    public function setCcn(?Conventioncollective $ccn): self
    {
        $this->ccn = $ccn;

        return $this;
    }

    /**
     * @return Collection|Tablemaintien[]
     */
    public function getTablemaintiens(): Collection
    {
        return $this->tablemaintiens;
    }

    public function addTablemaintien(Tablemaintien $tablemaintien): self
    {
        if (!$this->tablemaintiens->contains($tablemaintien)) {
            $this->tablemaintiens[] = $tablemaintien;
            $tablemaintien->setCriteremaintien($this);
        }

        return $this;
    }

    public function removeTablemaintien(Tablemaintien $tablemaintien): self
    {
        if ($this->tablemaintiens->contains($tablemaintien)) {
            $this->tablemaintiens->removeElement($tablemaintien);
            // set the owning side to null (unless already changed)
            if ($tablemaintien->getCriteremaintien() === $this) {
                $tablemaintien->setCriteremaintien(null);
            }
        }

        return $this;
    }
}
