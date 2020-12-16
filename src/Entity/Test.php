<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Projet::class, inversedBy="tests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;

    /**
     * @ORM\OneToMany(targetEntity=Testreponse::class, mappedBy="test", orphanRemoval=true)
     */
    private $testreponses;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $auteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    public function __construct()
    {
        $this->testreponses = new ArrayCollection();
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

   
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * @return Collection|Testreponse[]
     */
    public function getTestreponses(): Collection
    {
        return $this->testreponses;
    }

    public function addTestreponse(Testreponse $testreponse): self
    {
        if (!$this->testreponses->contains($testreponse)) {
            $this->testreponses[] = $testreponse;
            $testreponse->setTest($this);
        }

        return $this;
    }

    public function removeTestreponse(Testreponse $testreponse): self
    {
        if ($this->testreponses->removeElement($testreponse)) {
            // set the owning side to null (unless already changed)
            if ($testreponse->getTest() === $this) {
                $testreponse->setTest(null);
            }
        }

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

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
}
