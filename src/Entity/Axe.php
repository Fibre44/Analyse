<?php

namespace App\Entity;

use App\Repository\AxeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AxeRepository::class)
 */
class Axe
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
    private $Axe;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="axes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @ORM\OneToMany(targetEntity=Section::class, mappedBy="axe", orphanRemoval=true)
     */
    private $sections;

    /**
     * @ORM\Column(type="integer")
     */
    private $longueursection;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAxe(): ?string
    {
        return $this->Axe;
    }

    public function setAxe(string $Axe): self
    {
        $this->Axe = $Axe;

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
     * @return Collection|Section[]
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(Section $section): self
    {
        if (!$this->sections->contains($section)) {
            $this->sections[] = $section;
            $section->setAxe($this);
        }

        return $this;
    }

    public function removeSection(Section $section): self
    {
        if ($this->sections->contains($section)) {
            $this->sections->removeElement($section);
            // set the owning side to null (unless already changed)
            if ($section->getAxe() === $this) {
                $section->setAxe(null);
            }
        }

        return $this;
    }

    public function getLongueursection(): ?int
    {
        return $this->longueursection;
    }

    public function setLongueursection(int $longueursection): self
    {
        $this->longueursection = $longueursection;

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
