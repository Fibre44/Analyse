<?php

namespace App\Entity;

use App\Repository\BibliothequeccnRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=BibliothequeccnRepository::class)
 * @UniqueEntity(
 *  fields={"idcc"},
 *  message="La CCN existe déjà")
 */
class Bibliothequeccn
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
     * @ORM\OneToMany(targetEntity=Bibliothequeclassification::class, mappedBy="bibliothequeccn", orphanRemoval=true)
     */
    private $bibliothequeclassifications;

    /**
     * @ORM\OneToMany(targetEntity=Bibliothequecriteremaintien::class, mappedBy="bibliothequeccn", orphanRemoval=true)
     */
    private $bibliothequecriteremaintiens;

    /**
     * @ORM\OneToMany(targetEntity=Bibliothequeprimeanciennetepopulation::class, mappedBy="bibliothequeccn", orphanRemoval=true)
     */
    private $bibliothequeprimeanciennetepopulations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity=Bibliothequesmcpopulation::class, mappedBy="bibliothequeccn", orphanRemoval=true)
     */
    private $bibliothequesmcpopulations;

    public function __construct()
    {
        $this->bibliothequeclassifications = new ArrayCollection();
        $this->bibliothequecriteremaintiens = new ArrayCollection();
        $this->primeanciennetepopulations = new ArrayCollection();
        $this->bibliothequeprimeanciennetepopulations = new ArrayCollection();
        $this->bibliothequesmcpopulations = new ArrayCollection();
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

    /**
     * @return Collection|Bibliothequeclassification[]
     */
    public function getBibliothequeclassifications(): Collection
    {
        return $this->bibliothequeclassifications;
    }

    public function addBibliothequeclassification(Bibliothequeclassification $bibliothequeclassification): self
    {
        if (!$this->bibliothequeclassifications->contains($bibliothequeclassification)) {
            $this->bibliothequeclassifications[] = $bibliothequeclassification;
            $bibliothequeclassification->setBibliothequeccn($this);
        }

        return $this;
    }

    public function removeBibliothequeclassification(Bibliothequeclassification $bibliothequeclassification): self
    {
        if ($this->bibliothequeclassifications->contains($bibliothequeclassification)) {
            $this->bibliothequeclassifications->removeElement($bibliothequeclassification);
            // set the owning side to null (unless already changed)
            if ($bibliothequeclassification->getBibliothequeccn() === $this) {
                $bibliothequeclassification->setBibliothequeccn(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bibliothequecriteremaintien[]
     */
    public function getBibliothequecriteremaintiens(): Collection
    {
        return $this->bibliothequecriteremaintiens;
    }

    public function addBibliothequecriteremaintien(Bibliothequecriteremaintien $bibliothequecriteremaintien): self
    {
        if (!$this->bibliothequecriteremaintiens->contains($bibliothequecriteremaintien)) {
            $this->bibliothequecriteremaintiens[] = $bibliothequecriteremaintien;
            $bibliothequecriteremaintien->setBibliothequeccn($this);
        }

        return $this;
    }

    public function removeBibliothequecriteremaintien(Bibliothequecriteremaintien $bibliothequecriteremaintien): self
    {
        if ($this->bibliothequecriteremaintiens->contains($bibliothequecriteremaintien)) {
            $this->bibliothequecriteremaintiens->removeElement($bibliothequecriteremaintien);
            // set the owning side to null (unless already changed)
            if ($bibliothequecriteremaintien->getBibliothequeccn() === $this) {
                $bibliothequecriteremaintien->setBibliothequeccn(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bibliothequeprimeanciennetepopulation[]
     */
    public function getBibliothequeprimeanciennetepopulations(): Collection
    {
        return $this->bibliothequeprimeanciennetepopulations;
    }

    public function addBibliothequeprimeanciennetepopulation(Bibliothequeprimeanciennetepopulation $bibliothequeprimeanciennetepopulation): self
    {
        if (!$this->bibliothequeprimeanciennetepopulations->contains($bibliothequeprimeanciennetepopulation)) {
            $this->bibliothequeprimeanciennetepopulations[] = $bibliothequeprimeanciennetepopulation;
            $bibliothequeprimeanciennetepopulation->setBibliothequeccn($this);
        }

        return $this;
    }

    public function removeBibliothequeprimeanciennetepopulation(Bibliothequeprimeanciennetepopulation $bibliothequeprimeanciennetepopulation): self
    {
        if ($this->bibliothequeprimeanciennetepopulations->contains($bibliothequeprimeanciennetepopulation)) {
            $this->bibliothequeprimeanciennetepopulations->removeElement($bibliothequeprimeanciennetepopulation);
            // set the owning side to null (unless already changed)
            if ($bibliothequeprimeanciennetepopulation->getBibliothequeccn() === $this) {
                $bibliothequeprimeanciennetepopulation->setBibliothequeccn(null);
            }
        }

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|Bibliothequesmcpopulation[]
     */
    public function getBibliothequesmcpopulations(): Collection
    {
        return $this->bibliothequesmcpopulations;
    }

    public function addBibliothequesmcpopulation(Bibliothequesmcpopulation $bibliothequesmcpopulation): self
    {
        if (!$this->bibliothequesmcpopulations->contains($bibliothequesmcpopulation)) {
            $this->bibliothequesmcpopulations[] = $bibliothequesmcpopulation;
            $bibliothequesmcpopulation->setBibliothequeccn($this);
        }

        return $this;
    }

    public function removeBibliothequesmcpopulation(Bibliothequesmcpopulation $bibliothequesmcpopulation): self
    {
        if ($this->bibliothequesmcpopulations->contains($bibliothequesmcpopulation)) {
            $this->bibliothequesmcpopulations->removeElement($bibliothequesmcpopulation);
            // set the owning side to null (unless already changed)
            if ($bibliothequesmcpopulation->getBibliothequeccn() === $this) {
                $bibliothequesmcpopulation->setBibliothequeccn(null);
            }
        }

        return $this;
    }

 
}
