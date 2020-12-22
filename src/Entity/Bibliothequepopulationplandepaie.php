<?php

namespace App\Entity;

use App\Repository\BibliothequepopulationplandepaieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothequepopulationplandepaieRepository::class)
 */
class Bibliothequepopulationplandepaie
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
    private $logiciel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $regimess;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $population;

    /**
     * @ORM\OneToMany(targetEntity=Bibliothequeplandepaie::class, mappedBy="bibliothequepopulationplandepaie", orphanRemoval=true)
     */
    private $bibliothequeplandepaies;

    public function __construct()
    {
        $this->bibliothequeplandepaies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogiciel(): ?string
    {
        return $this->logiciel;
    }

    public function setLogiciel(string $logiciel): self
    {
        $this->logiciel = $logiciel;

        return $this;
    }

    public function getRegimess(): ?string
    {
        return $this->regimess;
    }

    public function setRegimess(string $regimess): self
    {
        $this->regimess = $regimess;

        return $this;
    }

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(string $population): self
    {
        $this->population = $population;

        return $this;
    }

    /**
     * @return Collection|Bibliothequeplandepaie[]
     */
    public function getBibliothequeplandepaies(): Collection
    {
        return $this->bibliothequeplandepaies;
    }

    public function addBibliothequeplandepaie(Bibliothequeplandepaie $bibliothequeplandepaie): self
    {
        if (!$this->bibliothequeplandepaies->contains($bibliothequeplandepaie)) {
            $this->bibliothequeplandepaies[] = $bibliothequeplandepaie;
            $bibliothequeplandepaie->setBibliothequepopulationplandepaie($this);
        }

        return $this;
    }

    public function removeBibliothequeplandepaie(Bibliothequeplandepaie $bibliothequeplandepaie): self
    {
        if ($this->bibliothequeplandepaies->removeElement($bibliothequeplandepaie)) {
            // set the owning side to null (unless already changed)
            if ($bibliothequeplandepaie->getBibliothequepopulationplandepaie() === $this) {
                $bibliothequeplandepaie->setBibliothequepopulationplandepaie(null);
            }
        }

        return $this;
    }
}
