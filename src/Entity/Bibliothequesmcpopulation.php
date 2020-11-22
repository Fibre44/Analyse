<?php

namespace App\Entity;

use App\Repository\BibliothequesmcpopulationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothequesmcpopulationRepository::class)
 */
class Bibliothequesmcpopulation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
 
    /**
     * @ORM\ManyToOne(targetEntity=Bibliothequeccn::class, inversedBy="bibliothequesmcpopulations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bibliothequeccn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $population;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etendu;

    /**
     * @ORM\OneToMany(targetEntity=Bibliothequesmcvaleur::class, mappedBy="bibliothequesmcpopulation", orphanRemoval=true)
     */
    private $bibliothequesmcvaleurs;

    public function __construct()
    {
        $this->bibliothequesmcvaleurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBibliothequeccn(): ?Bibliothequeccn
    {
        return $this->bibliothequeccn;
    }

    public function setBibliothequeccn(?Bibliothequeccn $bibliothequeccn): self
    {
        $this->bibliothequeccn = $bibliothequeccn;

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

    public function getEtendu(): ?bool
    {
        return $this->etendu;
    }

    public function setEtendu(bool $etendu): self
    {
        $this->etendu = $etendu;

        return $this;
    }

    /**
     * @return Collection|Bibliothequesmcvaleur[]
     */
    public function getBibliothequesmcvaleurs(): Collection
    {
        return $this->bibliothequesmcvaleurs;
    }

    public function addBibliothequesmcvaleur(Bibliothequesmcvaleur $bibliothequesmcvaleur): self
    {
        if (!$this->bibliothequesmcvaleurs->contains($bibliothequesmcvaleur)) {
            $this->bibliothequesmcvaleurs[] = $bibliothequesmcvaleur;
            $bibliothequesmcvaleur->setBibliothequesmcpopulation($this);
        }

        return $this;
    }

    public function removeBibliothequesmcvaleur(Bibliothequesmcvaleur $bibliothequesmcvaleur): self
    {
        if ($this->bibliothequesmcvaleurs->contains($bibliothequesmcvaleur)) {
            $this->bibliothequesmcvaleurs->removeElement($bibliothequesmcvaleur);
            // set the owning side to null (unless already changed)
            if ($bibliothequesmcvaleur->getBibliothequesmcpopulation() === $this) {
                $bibliothequesmcvaleur->setBibliothequesmcpopulation(null);
            }
        }

        return $this;
    }
}
