<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SocieteRepository::class)
 */
class Societe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $siren;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raisonsociale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $codepostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity=Projet::class, inversedBy="societes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;

    /**
     * @ORM\OneToMany(targetEntity=Etablissement::class, mappedBy="societe", orphanRemoval=true)
     */
    private $etablissements;
  
    /**
     * @ORM\OneToMany(targetEntity=Analytique::class, mappedBy="societe", orphanRemoval=true)
     */
    private $analytiques;

    /**
     * @ORM\OneToMany(targetEntity=Rubrique::class, mappedBy="societe", orphanRemoval=true)
     */
    private $rubriques;

    /**
     * @ORM\OneToMany(targetEntity=Conventioncollective::class, mappedBy="societe", orphanRemoval=true)
     */
    private $conventioncollectives;

    /**
     * @ORM\OneToMany(targetEntity=Emploi::class, mappedBy="societe", orphanRemoval=true)
     */
    private $emplois;

    /**
     * @ORM\OneToMany(targetEntity=Axe::class, mappedBy="societe", orphanRemoval=true)
     */
    private $axes;

    /**
     * @ORM\OneToMany(targetEntity=Calendrier::class, mappedBy="societe", orphanRemoval=true)
     */
    private $calendriers;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fnal;

    /**
     * @ORM\OneToMany(targetEntity=Provision::class, mappedBy="societe", orphanRemoval=true)
     */
    private $provisions;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etendu;

    /**
     * @ORM\OneToMany(targetEntity=Zonelibrehrs::class, mappedBy="societe", orphanRemoval=true)
     */
    private $zonelibrehrs;

    /**
     * @ORM\OneToMany(targetEntity=Tauxabsence::class, mappedBy="societe", orphanRemoval=true)
     */
    private $tauxabsences;

    /**
     * @ORM\OneToMany(targetEntity=Absence::class, mappedBy="societe",orphanRemoval=true)
     */
    private $absences;

    /**
     * @ORM\OneToMany(targetEntity=Etape::class, mappedBy="societe", orphanRemoval=true)
     */
    private $etapes;

    public function __construct()
    {
        $this->etablissements = new ArrayCollection();
        $this->analytiques = new ArrayCollection();
        $this->rubriques = new ArrayCollection();
        $this->conventioncollectives = new ArrayCollection();
        $this->emplois = new ArrayCollection();
        $this->axes = new ArrayCollection();
        $this->calendriers = new ArrayCollection();
        $this->provisions = new ArrayCollection();
        $this->zonelibrehrs = new ArrayCollection();
        $this->tauxabsences = new ArrayCollection();
        $this->absences = new ArrayCollection();
        $this->etapes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRaisonsociale(): ?string
    {
        return $this->raisonsociale;
    }

    public function setRaisonsociale(string $raisonsociale): self
    {
        $this->raisonsociale = $raisonsociale;

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
     * @return Collection|Etablissement[]
     */
    public function getEtablissements(): Collection
    {
        return $this->etablissements;
    }

    public function addEtablissement(Etablissement $etablissement): self
    {
        if (!$this->etablissements->contains($etablissement)) {
            $this->etablissements[] = $etablissement;
            $etablissement->setSociete($this);
        }

        return $this;
    }

    public function removeEtablissement(Etablissement $etablissement): self
    {
        if ($this->etablissements->contains($etablissement)) {
            $this->etablissements->removeElement($etablissement);
            // set the owning side to null (unless already changed)
            if ($etablissement->getSociete() === $this) {
                $etablissement->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Analytique[]
     */
    public function getAnalytiques(): Collection
    {
        return $this->analytiques;
    }

    public function addAnalytique(Analytique $analytique): self
    {
        if (!$this->analytiques->contains($analytique)) {
            $this->analytiques[] = $analytique;
            $analytique->setSociete($this);
        }

        return $this;
    }

    public function removeAnalytique(Analytique $analytique): self
    {
        if ($this->analytiques->contains($analytique)) {
            $this->analytiques->removeElement($analytique);
            // set the owning side to null (unless already changed)
            if ($analytique->getSociete() === $this) {
                $analytique->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rubrique[]
     */
    public function getRubriques(): Collection
    {
        return $this->rubriques;
    }

    public function addRubrique(Rubrique $rubrique): self
    {
        if (!$this->rubriques->contains($rubrique)) {
            $this->rubriques[] = $rubrique;
            $rubrique->setSociete($this);
        }

        return $this;
    }

    public function removeRubrique(Rubrique $rubrique): self
    {
        if ($this->rubriques->contains($rubrique)) {
            $this->rubriques->removeElement($rubrique);
            // set the owning side to null (unless already changed)
            if ($rubrique->getSociete() === $this) {
                $rubrique->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Conventioncollective[]
     */
    public function getConventioncollectives(): Collection
    {
        return $this->conventioncollectives;
    }

    public function addConventioncollective(Conventioncollective $conventioncollective): self
    {
        if (!$this->conventioncollectives->contains($conventioncollective)) {
            $this->conventioncollectives[] = $conventioncollective;
            $conventioncollective->setSociete($this);
        }

        return $this;
    }

    public function removeConventioncollective(Conventioncollective $conventioncollective): self
    {
        if ($this->conventioncollectives->contains($conventioncollective)) {
            $this->conventioncollectives->removeElement($conventioncollective);
            // set the owning side to null (unless already changed)
            if ($conventioncollective->getSociete() === $this) {
                $conventioncollective->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Emploi[]
     */
    public function getEmplois(): Collection
    {
        return $this->emplois;
    }

    public function addEmploi(Emploi $emploi): self
    {
        if (!$this->emplois->contains($emploi)) {
            $this->emplois[] = $emploi;
            $emploi->setSociete($this);
        }

        return $this;
    }

    public function removeEmploi(Emploi $emploi): self
    {
        if ($this->emplois->contains($emploi)) {
            $this->emplois->removeElement($emploi);
            // set the owning side to null (unless already changed)
            if ($emploi->getSociete() === $this) {
                $emploi->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Axe[]
     */
    public function getAxes(): Collection
    {
        return $this->axes;
    }

    public function addAxe(Axe $axe): self
    {
        if (!$this->axes->contains($axe)) {
            $this->axes[] = $axe;
            $axe->setSociete($this);
        }

        return $this;
    }

    public function removeAxe(Axe $axe): self
    {
        if ($this->axes->contains($axe)) {
            $this->axes->removeElement($axe);
            // set the owning side to null (unless already changed)
            if ($axe->getSociete() === $this) {
                $axe->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Calendrier[]
     */
    public function getCalendriers(): Collection
    {
        return $this->calendriers;
    }

    public function addCalendrier(Calendrier $calendrier): self
    {
        if (!$this->calendriers->contains($calendrier)) {
            $this->calendriers[] = $calendrier;
            $calendrier->setSociete($this);
        }

        return $this;
    }

    public function removeCalendrier(Calendrier $calendrier): self
    {
        if ($this->calendriers->contains($calendrier)) {
            $this->calendriers->removeElement($calendrier);
            // set the owning side to null (unless already changed)
            if ($calendrier->getSociete() === $this) {
                $calendrier->setSociete(null);
            }
        }

        return $this;
    }

    public function getFnal(): ?string
    {
        return $this->fnal;
    }

    public function setFnal(string $fnal): self
    {
        $this->fnal = $fnal;

        return $this;
    }

    /**
     * @return Collection|Provision[]
     */
    public function getProvisions(): Collection
    {
        return $this->provisions;
    }

    public function addProvision(Provision $provision): self
    {
        if (!$this->provisions->contains($provision)) {
            $this->provisions[] = $provision;
            $provision->setSociete($this);
        }

        return $this;
    }

    public function removeProvision(Provision $provision): self
    {
        if ($this->provisions->contains($provision)) {
            $this->provisions->removeElement($provision);
            // set the owning side to null (unless already changed)
            if ($provision->getSociete() === $this) {
                $provision->setSociete(null);
            }
        }

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

    /**
     * @return Collection|Zonelibrehrs[]
     */
    public function getZonelibrehrs(): Collection
    {
        return $this->zonelibrehrs;
    }

    public function addZonelibrehrs(Zonelibrehrs $zonelibrehr): self
    {
        if (!$this->zonelibrehrs->contains($zonelibrehr)) {
            $this->zonelibrehrs[] = $zonelibrehr;
            $zonelibrehr->setSociete($this);
        }

        return $this;
    }

    public function removeZonelibrehrs(Zonelibrehrs $zonelibrehr): self
    {
        if ($this->zonelibrehrs->contains($zonelibrehr)) {
            $this->zonelibrehrs->removeElement($zonelibrehr);
            // set the owning side to null (unless already changed)
            if ($zonelibrehr->getSociete() === $this) {
                $zonelibrehr->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tauxabsence[]
     */
    public function getTauxabsences(): Collection
    {
        return $this->tauxabsences;
    }

    public function addTauxabsence(Tauxabsence $tauxabsence): self
    {
        if (!$this->tauxabsences->contains($tauxabsence)) {
            $this->tauxabsences[] = $tauxabsence;
            $tauxabsence->setSociete($this);
        }

        return $this;
    }

    public function removeTauxabsence(Tauxabsence $tauxabsence): self
    {
        if ($this->tauxabsences->contains($tauxabsence)) {
            $this->tauxabsences->removeElement($tauxabsence);
            // set the owning side to null (unless already changed)
            if ($tauxabsence->getSociete() === $this) {
                $tauxabsence->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Absence[]
     */
    public function getAbsences(): Collection
    {
        return $this->absences;
    }

    public function addAbsence(Absence $absence): self
    {
        if (!$this->absences->contains($absence)) {
            $this->absences[] = $absence;
            $absence->setSociete($this);
        }

        return $this;
    }

    public function removeAbsence(Absence $absence): self
    {
        if ($this->absences->contains($absence)) {
            $this->absences->removeElement($absence);
            // set the owning side to null (unless already changed)
            if ($absence->getSociete() === $this) {
                $absence->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Etape[]
     */
    public function getEtapes(): Collection
    {
        return $this->etapes;
    }

    public function addEtape(Etape $etape): self
    {
        if (!$this->etapes->contains($etape)) {
            $this->etapes[] = $etape;
            $etape->setSociete($this);
        }

        return $this;
    }

    public function removeEtape(Etape $etape): self
    {
        if ($this->etapes->removeElement($etape)) {
            // set the owning side to null (unless already changed)
            if ($etape->getSociete() === $this) {
                $etape->setSociete(null);
            }
        }

        return $this;
    }

    
}
