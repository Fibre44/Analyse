<?php

namespace App\Entity;

use App\Repository\ConventioncollectiveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConventioncollectiveRepository::class)
 */
class Conventioncollective
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
    private $idcc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="conventioncollectives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @ORM\OneToMany(targetEntity=Classification::class, mappedBy="conventioncollective", orphanRemoval=true)
     */
    private $classifications;

    /**
     * @ORM\OneToMany(targetEntity=Maintiendesalaire::class, mappedBy="conventioncollective", orphanRemoval=true)
     */
    private $maintiendesalaires;

    /**
     * @ORM\OneToMany(targetEntity=Criteremaintien::class, mappedBy="ccn", orphanRemoval=true)
     */
    private $criteremaintiens;

    /**
     * @ORM\OneToMany(targetEntity=Primeanciennetepopulation::class, mappedBy="conventioncollective", orphanRemoval=true)
     */
    private $primeanciennetepopulations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $origine;

    public function __construct()
    {
        $this->classifications = new ArrayCollection();
        $this->maintiendesalaires = new ArrayCollection();
        $this->criteremaintiens = new ArrayCollection();
        $this->primeanciennetepopulations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdcc(): ?string
    {
        return $this->idcc;
    }

    public function setIdcc(string $idcc): self
    {
        $this->idcc = $idcc;

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

    public function getSociete(): ?Societe
    {
        return $this->societe;
    }

    public function setSociete(?Societe $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * @return Collection|Classification[]
     */
    public function getClassifications(): Collection
    {
        return $this->classifications;
    }

    public function addClassification(Classification $classification): self
    {
        if (!$this->classifications->contains($classification)) {
            $this->classifications[] = $classification;
            $classification->setConventioncollective($this);
        }

        return $this;
    }

    public function removeClassification(Classification $classification): self
    {
        if ($this->classifications->contains($classification)) {
            $this->classifications->removeElement($classification);
            // set the owning side to null (unless already changed)
            if ($classification->getConventioncollective() === $this) {
                $classification->setConventioncollective(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Maintiendesalaire[]
     */
    public function getMaintiendesalaires(): Collection
    {
        return $this->maintiendesalaires;
    }

    public function addMaintiendesalaire(Maintiendesalaire $maintiendesalaire): self
    {
        if (!$this->maintiendesalaires->contains($maintiendesalaire)) {
            $this->maintiendesalaires[] = $maintiendesalaire;
            $maintiendesalaire->setConventioncollective($this);
        }

        return $this;
    }

    public function removeMaintiendesalaire(Maintiendesalaire $maintiendesalaire): self
    {
        if ($this->maintiendesalaires->contains($maintiendesalaire)) {
            $this->maintiendesalaires->removeElement($maintiendesalaire);
            // set the owning side to null (unless already changed)
            if ($maintiendesalaire->getConventioncollective() === $this) {
                $maintiendesalaire->setConventioncollective(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Criteremaintien[]
     */
    public function getCriteremaintiens(): Collection
    {
        return $this->criteremaintiens;
    }

    public function addCriteremaintien(Criteremaintien $criteremaintien): self
    {
        if (!$this->criteremaintiens->contains($criteremaintien)) {
            $this->criteremaintiens[] = $criteremaintien;
            $criteremaintien->setCcn($this);
        }

        return $this;
    }

    public function removeCriteremaintien(Criteremaintien $criteremaintien): self
    {
        if ($this->criteremaintiens->contains($criteremaintien)) {
            $this->criteremaintiens->removeElement($criteremaintien);
            // set the owning side to null (unless already changed)
            if ($criteremaintien->getCcn() === $this) {
                $criteremaintien->setCcn(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Primeanciennetepopulation[]
     */
    public function getPrimeanciennetepopulations(): Collection
    {
        return $this->primeanciennetepopulations;
    }

    public function addPrimeanciennetepopulation(Primeanciennetepopulation $primeanciennetepopulation): self
    {
        if (!$this->primeanciennetepopulations->contains($primeanciennetepopulation)) {
            $this->primeanciennetepopulations[] = $primeanciennetepopulation;
            $primeanciennetepopulation->setConventioncollective($this);
        }

        return $this;
    }

    public function removePrimeanciennetepopulation(Primeanciennetepopulation $primeanciennetepopulation): self
    {
        if ($this->primeanciennetepopulations->contains($primeanciennetepopulation)) {
            $this->primeanciennetepopulations->removeElement($primeanciennetepopulation);
            // set the owning side to null (unless already changed)
            if ($primeanciennetepopulation->getConventioncollective() === $this) {
                $primeanciennetepopulation->setConventioncollective(null);
            }
        }

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }
}
