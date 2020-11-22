<?php

namespace App\Entity;

use App\Repository\AnomalierubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnomalierubriqueRepository::class)
 */
class Anomalierubrique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Rubrique::class, inversedBy="titre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rubrique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity=Messageanomalie::class, mappedBy="anomalie", orphanRemoval=true)
     */
    private $messageanomalies;

    public function __construct()
    {
        $this->messageanomalies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRubrique(): ?Rubrique
    {
        return $this->rubrique;
    }

    public function setRubrique(?Rubrique $rubrique): self
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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
     * @return Collection|Messageanomalie[]
     */
    public function getMessageanomalies(): Collection
    {
        return $this->messageanomalies;
    }

    public function addMessageanomaly(Messageanomalie $messageanomaly): self
    {
        if (!$this->messageanomalies->contains($messageanomaly)) {
            $this->messageanomalies[] = $messageanomaly;
            $messageanomaly->setAnomalie($this);
        }

        return $this;
    }

    public function removeMessageanomaly(Messageanomalie $messageanomaly): self
    {
        if ($this->messageanomalies->contains($messageanomaly)) {
            $this->messageanomalies->removeElement($messageanomaly);
            // set the owning side to null (unless already changed)
            if ($messageanomaly->getAnomalie() === $this) {
                $messageanomaly->setAnomalie(null);
            }
        }

        return $this;
    }
}
