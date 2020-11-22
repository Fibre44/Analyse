<?php

namespace App\Entity;

use App\Repository\BibliothequecriteremaintienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothequecriteremaintienRepository::class)
 */
class Bibliothequecriteremaintien
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
    private $population;

    /**
     * @ORM\ManyToOne(targetEntity=Bibliothequeccn::class, inversedBy="bibliothequecriteremaintiens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bibliothequeccn;

    /**
     * @ORM\OneToMany(targetEntity=Bibliothequetablemaintien::class, mappedBy="bibliothequecriteremaintien", orphanRemoval=true)
     */
    private $bibliothequetablemaintiens;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etendu;


    public function __construct()
    {
        $this->bibliothequetablemaintiens = new ArrayCollection();
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

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(string $population): self
    {
        $this->population = $population;

        return $this;
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

    /**
     * @return Collection|Bibliothequetablemaintien[]
     */
    public function getBibliothequetablemaintiens(): Collection
    {
        return $this->bibliothequetablemaintiens;
    }

    public function addBibliothequetablemaintien(Bibliothequetablemaintien $bibliothequetablemaintien): self
    {
        if (!$this->bibliothequetablemaintiens->contains($bibliothequetablemaintien)) {
            $this->bibliothequetablemaintiens[] = $bibliothequetablemaintien;
            $bibliothequetablemaintien->setBibliothequecriteremaintien($this);
        }

        return $this;
    }

    public function removeBibliothequetablemaintien(Bibliothequetablemaintien $bibliothequetablemaintien): self
    {
        if ($this->bibliothequetablemaintiens->contains($bibliothequetablemaintien)) {
            $this->bibliothequetablemaintiens->removeElement($bibliothequetablemaintien);
            // set the owning side to null (unless already changed)
            if ($bibliothequetablemaintien->getBibliothequecriteremaintien() === $this) {
                $bibliothequetablemaintien->setBibliothequecriteremaintien(null);
            }
        }

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
