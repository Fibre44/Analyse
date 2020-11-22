<?php

namespace App\Entity;

use App\Repository\BanqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BanqueRepository::class)
 */
class Banque
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
    private $iban;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bic;

    /**
     * @ORM\ManyToOne(targetEntity=Etablissement::class, inversedBy="banques")
     */
    private $etablissements;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getBic(): ?string
    {
        return $this->bic;
    }

    public function setBic(string $bic): self
    {
        $this->bic = $bic;

        return $this;
    }

    public function getEtablissements(): ?Etablissement
    {
        return $this->etablissements;
    }

    public function setEtablissements(?Etablissement $etablissements): self
    {
        $this->etablissements = $etablissements;

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
