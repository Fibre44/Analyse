<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logiciel;

    /**
     * @ORM\Column(type="string", length=9)
     * @Assert\Length(min=9, max=9)
     */
    private $sic;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    /**
     * @ORM\OneToMany(targetEntity=Societe::class, mappedBy="projet")
     */
    private $societes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $createur;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, mappedBy="projets")
     */
    private $utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity=Journalprojet::class, mappedBy="projet", orphanRemoval=true)
     */
    private $journalprojets;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $archive;

    /**
     * @ORM\OneToMany(targetEntity=Signature::class, mappedBy="projet", orphanRemoval=true)
     */
    private $signatures;

    /**
     * @ORM\OneToMany(targetEntity=Anomalie::class, mappedBy="projet", orphanRemoval=true)
     */
    private $anomalies;

    /**
     * @ORM\OneToMany(targetEntity=Test::class, mappedBy="projet", orphanRemoval=true)
     */
    private $tests;

    public function __construct()
    {
        $this->societes = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
        $this->journalprojets = new ArrayCollection();
        $this->signatures = new ArrayCollection();
        $this->anomalies = new ArrayCollection();
        $this->tests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLogiciel(): ?string
    {
        return $this->logiciel;
    }

    public function setLogiciel(string $logiciel): self
    {
        $this->logiciel = $logiciel;

        return $this;
    }

    public function getSic(): ?string
    {
        return $this->sic;
    }

    public function setSic(string $sic): self
    {
        $this->sic = $sic;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * @return Collection|Societe[]
     */
    public function getSocietes(): Collection
    {
        return $this->societes;
    }

    public function addSociete(Societe $societe): self
    {
        if (!$this->societes->contains($societe)) {
            $this->societes[] = $societe;
            $societe->setProjet($this);
        }

        return $this;
    }

    public function removeSociete(Societe $societe): self
    {
        if ($this->societes->contains($societe)) {
            $this->societes->removeElement($societe);
            // set the owning side to null (unless already changed)
            if ($societe->getProjet() === $this) {
                $societe->setProjet(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreateur(): ?string
    {
        return $this->createur;
    }

    public function setCreateur(string $createur): self
    {
        $this->createur = $createur;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->addProjet($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            $utilisateur->removeProjet($this);
        }

        return $this;
    }

    /**
     * @return Collection|Journalprojet[]
     */
    public function getJournalprojets(): Collection
    {
        return $this->journalprojets;
    }

    public function addJournalprojet(Journalprojet $journalprojet): self
    {
        if (!$this->journalprojets->contains($journalprojet)) {
            $this->journalprojets[] = $journalprojet;
            $journalprojet->setProjet($this);
        }

        return $this;
    }

    public function removeJournalprojet(Journalprojet $journalprojet): self
    {
        if ($this->journalprojets->contains($journalprojet)) {
            $this->journalprojets->removeElement($journalprojet);
            // set the owning side to null (unless already changed)
            if ($journalprojet->getProjet() === $this) {
                $journalprojet->setProjet(null);
            }
        }

        return $this;
    }

    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(?bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * @return Collection|Signature[]
     */
    public function getSignatures(): Collection
    {
        return $this->signatures;
    }

    public function addSignature(Signature $signature): self
    {
        if (!$this->signatures->contains($signature)) {
            $this->signatures[] = $signature;
            $signature->setProjet($this);
        }

        return $this;
    }

    public function removeSignature(Signature $signature): self
    {
        if ($this->signatures->removeElement($signature)) {
            // set the owning side to null (unless already changed)
            if ($signature->getProjet() === $this) {
                $signature->setProjet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Anomalie[]
     */
    public function getAnomalies(): Collection
    {
        return $this->anomalies;
    }

    public function addAnomalie(Anomalie $anomaly): self
    {
        if (!$this->anomalies->contains($anomaly)) {
            $this->anomalies[] = $anomaly;
            $anomaly->setProjet($this);
        }

        return $this;
    }

    public function removeAnomalie(Anomalie $anomaly): self
    {
        if ($this->anomalies->removeElement($anomaly)) {
            // set the owning side to null (unless already changed)
            if ($anomaly->getProjet() === $this) {
                $anomaly->setProjet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Test[]
     */
    public function getTests(): Collection
    {
        return $this->tests;
    }

    public function addTest(Test $test): self
    {
        if (!$this->tests->contains($test)) {
            $this->tests[] = $test;
            $test->setProjet($this);
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        if ($this->tests->removeElement($test)) {
            // set the owning side to null (unless already changed)
            if ($test->getProjet() === $this) {
                $test->setProjet(null);
            }
        }

        return $this;
    }
}
