<?php

namespace App\Entity;

use App\Repository\PrimeanciennetepopulationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrimeanciennetepopulationRepository::class)
 */
class Primeanciennetepopulation
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
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Primeanciennetevaleur::class, mappedBy="primeanciennetepopulation", orphanRemoval=true)
     */
    private $primeanciennetevaleurs;

    /**
     * @ORM\ManyToOne(targetEntity=Conventioncollective::class, inversedBy="primeanciennetepopulations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conventioncollective;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etendu;

    public function __construct()
    {
        $this->primeanciennetevaleurs = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Primeanciennetevaleur[]
     */
    public function getPrimeanciennetevaleurs(): Collection
    {
        return $this->primeanciennetevaleurs;
    }

    public function addPrimeanciennetevaleur(Primeanciennetevaleur $primeanciennetevaleur): self
    {
        if (!$this->primeanciennetevaleurs->contains($primeanciennetevaleur)) {
            $this->primeanciennetevaleurs[] = $primeanciennetevaleur;
            $primeanciennetevaleur->setPrimeanciennetepopulation($this);
        }

        return $this;
    }

    public function removePrimeanciennetevaleur(Primeanciennetevaleur $primeanciennetevaleur): self
    {
        if ($this->primeanciennetevaleurs->contains($primeanciennetevaleur)) {
            $this->primeanciennetevaleurs->removeElement($primeanciennetevaleur);
            // set the owning side to null (unless already changed)
            if ($primeanciennetevaleur->getPrimeanciennetepopulation() === $this) {
                $primeanciennetevaleur->setPrimeanciennetepopulation(null);
            }
        }

        return $this;
    }

    public function getConventioncollective(): ?Conventioncollective
    {
        return $this->conventioncollective;
    }

    public function setConventioncollective(?Conventioncollective $conventioncollective): self
    {
        $this->conventioncollective = $conventioncollective;

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
