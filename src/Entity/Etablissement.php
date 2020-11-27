<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtablissementRepository::class)
 */
class Etablissement
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
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codepostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ape;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="etablissements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @ORM\OneToMany(targetEntity=Banque::class, mappedBy="etablissements")
     */
    private $banques;

    /**
     * @ORM\OneToMany(targetEntity=Tauxat::class, mappedBy="etablissement", orphanRemoval=true)
     */
    private $tauxats;


    /**
     * @ORM\Column(type="string", length=9)
     */
    private $siren;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $nic;

    /**
     * @ORM\OneToMany(targetEntity=Organisme::class, mappedBy="etablissement", orphanRemoval=true)
     */
    private $organismes;

    /**
     * @ORM\OneToMany(targetEntity=Congepaye::class, mappedBy="etablissement", orphanRemoval=true)
     */
    private $congepayes;

  
    public function __construct()
    {
        $this->banques = new ArrayCollection();
        $this->tauxats = new ArrayCollection();
        $this->organismes = new ArrayCollection();
        $this->congepayes = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getApe(): ?string
    {
        return $this->ape;
    }

    public function setApe(string $ape): self
    {
        $this->ape = $ape;

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
     * @return Collection|Banque[]
     */
    public function getBanques(): Collection
    {
        return $this->banques;
    }

    public function addBanque(Banque $banque): self
    {
        if (!$this->banques->contains($banque)) {
            $this->banques[] = $banque;
            $banque->setEtablissements($this);
        }

        return $this;
    }

    public function removeBanque(Banque $banque): self
    {
        if ($this->banques->contains($banque)) {
            $this->banques->removeElement($banque);
            // set the owning side to null (unless already changed)
            if ($banque->getEtablissements() === $this) {
                $banque->setEtablissements(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tauxat[]
     */
    public function getTauxats(): Collection
    {
        return $this->tauxats;
    }

    public function addTauxat(Tauxat $tauxat): self
    {
        if (!$this->tauxats->contains($tauxat)) {
            $this->tauxats[] = $tauxat;
            $tauxat->setEtablissement($this);
        }

        return $this;
    }

    public function removeTauxat(Tauxat $tauxat): self
    {
        if ($this->tauxats->contains($tauxat)) {
            $this->tauxats->removeElement($tauxat);
            // set the owning side to null (unless already changed)
            if ($tauxat->getEtablissement() === $this) {
                $tauxat->setEtablissement(null);
            }
        }

        return $this;
    }

    public function getSiren(): ?string
    {
        return $this->siren;
    }

    public function setSiren(string $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getNic(): ?string
    {
        return $this->nic;
    }

    public function setNic(string $nic): self
    {
        $this->nic = $nic;

        return $this;
    }

    /**
     * @return Collection|Organisme[]
     */
    public function getOrganismes(): Collection
    {
        return $this->organismes;
    }

    public function addOrganisme(Organisme $organisme): self
    {
        if (!$this->organismes->contains($organisme)) {
            $this->organismes[] = $organisme;
            $organisme->setEtablissement($this);
        }

        return $this;
    }

    public function removeOrganisme(Organisme $organisme): self
    {
        if ($this->organismes->removeElement($organisme)) {
            // set the owning side to null (unless already changed)
            if ($organisme->getEtablissement() === $this) {
                $organisme->setEtablissement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Congepaye[]
     */
    public function getCongepayes(): Collection
    {
        return $this->congepayes;
    }

    public function addCongepaye(Congepaye $congepaye): self
    {
        if (!$this->congepayes->contains($congepaye)) {
            $this->congepayes[] = $congepaye;
            $congepaye->setEtablissement($this);
        }

        return $this;
    }

    public function removeCongepaye(Congepaye $congepaye): self
    {
        if ($this->congepayes->removeElement($congepaye)) {
            // set the owning side to null (unless already changed)
            if ($congepaye->getEtablissement() === $this) {
                $congepaye->setEtablissement(null);
            }
        }

        return $this;
    }


}
