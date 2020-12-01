<?php

namespace App\Entity;

use App\Repository\BibliothequeprimeanciennetepopulationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothequeprimeanciennetepopulationRepository::class)
 */
class Bibliothequeprimeanciennetepopulation
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
     * @ORM\Column(type="boolean")
     */
    private $etendu;

    /**
     * @ORM\ManyToOne(targetEntity=Bibliothequeccn::class, inversedBy="bibliothequeprimeanciennetepopulations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bibliothequeccn;

    /**
     * @ORM\OneToMany(targetEntity=Bibliothequeprimeanciennetevaleur::class, mappedBy="bibliothequeprimeanciennetepopulation", orphanRemoval=true)
     */
    private $yes;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
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

    public function getEtendu()
    {
        return $this->etendu;
    }

    public function setEtendu($etendu): self
    {
        $this->etendu = $etendu;

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
     * @return Collection|Bibliothequeprimeanciennetevaleur[]
     */
    public function getBibliothequeprimeanciennetevaleur(): Collection
    {
        return $this->yes;
    }

    public function addBibliothequeprimeanciennetevaleur(Bibliothequeprimeanciennetevaleur $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setBibliothequeprimeanciennetepopulation($this);
        }

        return $this;
    }

    public function removeYe(Bibliothequeprimeanciennetevaleur $ye): self
    {
        if ($this->yes->contains($ye)) {
            $this->yes->removeElement($ye);
            // set the owning side to null (unless already changed)
            if ($ye->getBibliothequeprimeanciennetepopulation() === $this) {
                $ye->setBibliothequeprimeanciennetepopulation(null);
            }
        }

        return $this;
    }
}
