<?php

namespace App\Entity;

use App\Repository\MaintiendesalaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaintiendesalaireRepository::class)
 */
class Maintiendesalaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Conventioncollective::class, inversedBy="maintiendesalaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conventioncollective;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ancienneteminimum;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbremoisancienneteminimum;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbremoisanciennetemaximum;

    /**
     * @ORM\OneToMany(targetEntity=Pourcentagemaintien::class, mappedBy="Maintiensalaire", orphanRemoval=true)
     */
    private $pourcentagemaintiens;

    public function __construct()
    {
        $this->pourcentagemaintiens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getAncienneteminimum(): ?string
    {
        return $this->ancienneteminimum;
    }

    public function setAncienneteminimum(string $ancienneteminimum): self
    {
        $this->ancienneteminimum = $ancienneteminimum;

        return $this;
    }

    public function getNbremoisancienneteminimum(): ?int
    {
        return $this->nbremoisancienneteminimum;
    }

    public function setNbremoisancienneteminimum(int $nbremoisancienneteminimum): self
    {
        $this->nbremoisancienneteminimum = $nbremoisancienneteminimum;

        return $this;
    }

    public function getNbremoisanciennetemaximum(): ?int
    {
        return $this->nbremoisanciennetemaximum;
    }

    public function setNbremoisanciennetemaximum(int $nbremoisanciennetemaximum): self
    {
        $this->nbremoisanciennetemaximum = $nbremoisanciennetemaximum;

        return $this;
    }

    /**
     * @return Collection|Pourcentagemaintien[]
     */
    public function getPourcentagemaintiens(): Collection
    {
        return $this->pourcentagemaintiens;
    }

    public function addPourcentagemaintien(Pourcentagemaintien $pourcentagemaintien): self
    {
        if (!$this->pourcentagemaintiens->contains($pourcentagemaintien)) {
            $this->pourcentagemaintiens[] = $pourcentagemaintien;
            $pourcentagemaintien->setMaintiensalaire($this);
        }

        return $this;
    }

    public function removePourcentagemaintien(Pourcentagemaintien $pourcentagemaintien): self
    {
        if ($this->pourcentagemaintiens->contains($pourcentagemaintien)) {
            $this->pourcentagemaintiens->removeElement($pourcentagemaintien);
            // set the owning side to null (unless already changed)
            if ($pourcentagemaintien->getMaintiensalaire() === $this) {
                $pourcentagemaintien->setMaintiensalaire(null);
            }
        }

        return $this;
    }
}
