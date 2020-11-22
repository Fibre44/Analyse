<?php

namespace App\Entity;

use App\Repository\ZonelibrehrsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZonelibrehrsRepository::class)
 */
class Zonelibrehrs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Valeurzonelibrehrs::class, mappedBy="zone", orphanRemoval=true)
     */
    private $valeurzonelibrehrs;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="zonelibrehrs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nature;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    public function __construct()
    {
        $this->valeurzonelibrehrs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

 
    /**
     * @return Collection|Valeurzonelibrehrs[]
     */
    public function getValeurzonelibrehrs(): Collection
    {
        return $this->valeurzonelibrehrs;
    }

    public function addValeurzonelibrehr(Valeurzonelibrehrs $valeurzonelibrehr): self
    {
        if (!$this->valeurzonelibrehrs->contains($valeurzonelibrehr)) {
            $this->valeurzonelibrehrs[] = $valeurzonelibrehr;
            $valeurzonelibrehr->setZone($this);
        }

        return $this;
    }

    public function removeValeurzonelibrehr(Valeurzonelibrehrs $valeurzonelibrehr): self
    {
        if ($this->valeurzonelibrehrs->contains($valeurzonelibrehr)) {
            $this->valeurzonelibrehrs->removeElement($valeurzonelibrehr);
            // set the owning side to null (unless already changed)
            if ($valeurzonelibrehr->getZone() === $this) {
                $valeurzonelibrehr->setZone(null);
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

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): self
    {
        $this->nature = $nature;

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
}
