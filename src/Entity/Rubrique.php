<?php

namespace App\Entity;

use App\Repository\RubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RubriqueRepository::class)
 */
class Rubrique
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
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nature;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $base;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taux;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $montant;

    
    /**
     * @ORM\OneToMany(targetEntity=Anomalierubrique::class, mappedBy="rubrique", orphanRemoval=true)
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="rubriques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profilrem;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profilcot;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $periodeapplication;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $population;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $divers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dsnperiodeprime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dsnnatureprime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dsnautreselement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dsntyperappelpaie;

    public function __construct()
    {
        $this->titre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getBase(): ?string
    {
        return $this->base;
    }

    public function setBase(?string $base): self
    {
        $this->base = $base;

        return $this;
    }

    public function getTaux(): ?string
    {
        return $this->taux;
    }

    public function setTaux(?string $taux): self
    {
        $this->taux = $taux;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

   
    /**
     * @return Collection|Anomalierubrique[]
     */
    public function getTitre(): Collection
    {
        return $this->titre;
    }

    public function addTitre(Anomalierubrique $titre): self
    {
        if (!$this->titre->contains($titre)) {
            $this->titre[] = $titre;
            $titre->setRubrique($this);
        }

        return $this;
    }

    public function removeTitre(Anomalierubrique $titre): self
    {
        if ($this->titre->contains($titre)) {
            $this->titre->removeElement($titre);
            // set the owning side to null (unless already changed)
            if ($titre->getRubrique() === $this) {
                $titre->setRubrique(null);
            }
        }

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

    public function getProfilrem(): ?string
    {
        return $this->profilrem;
    }

    public function setProfilrem(?string $profilrem): self
    {
        $this->profilrem = $profilrem;

        return $this;
    }

    public function getProfilcot(): ?string
    {
        return $this->profilcot;
    }

    public function setProfilcot(?string $profilcot): self
    {
        $this->profilcot = $profilcot;

        return $this;
    }

    public function getPeriodeapplication(): ?string
    {
        return $this->periodeapplication;
    }

    public function setPeriodeapplication(?string $periodeapplication): self
    {
        $this->periodeapplication = $periodeapplication;

        return $this;
    }

    public function getPopulation(): ?string
    {
        return $this->population;
    }

    public function setPopulation(?string $population): self
    {
        $this->population = $population;

        return $this;
    }

    public function getDivers(): ?string
    {
        return $this->divers;
    }

    public function setDivers(?string $divers): self
    {
        $this->divers = $divers;

        return $this;
    }

    public function getDsnperiodeprime(): ?string
    {
        return $this->dsnperiodeprime;
    }

    public function setDsnperiodeprime(?string $dsnperiodeprime): self
    {
        $this->dsnperiodeprime = $dsnperiodeprime;

        return $this;
    }

    public function getDsnnatureprime(): ?string
    {
        return $this->dsnnatureprime;
    }

    public function setDsnnatureprime(?string $dsnnatureprime): self
    {
        $this->dsnnatureprime = $dsnnatureprime;

        return $this;
    }

    public function getDsnautreselement(): ?string
    {
        return $this->dsnautreselement;
    }

    public function setDsnautreselement(?string $dsnautreselement): self
    {
        $this->dsnautreselement = $dsnautreselement;

        return $this;
    }

    public function getDsntyperappelpaie(): ?string
    {
        return $this->dsntyperappelpaie;
    }

    public function setDsntyperappelpaie(?string $dsntyperappelpaie): self
    {
        $this->dsntyperappelpaie = $dsntyperappelpaie;

        return $this;
    }
}
