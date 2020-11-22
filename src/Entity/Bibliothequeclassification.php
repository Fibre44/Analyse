<?php

namespace App\Entity;

use App\Repository\BibliothequeclassificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothequeclassificationRepository::class)
 */
class Bibliothequeclassification
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity=Bibliothequeccn::class, inversedBy="bibliothequeclassifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bibliothequeccn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): self
    {
        $this->valeur = $valeur;

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
