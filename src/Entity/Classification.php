<?php

namespace App\Entity;

use App\Repository\ClassificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClassificationRepository::class)
 */
class Classification
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
     * @ORM\ManyToOne(targetEntity=Conventioncollective::class, inversedBy="classifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conventioncollective;

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

    public function getConventioncollective(): ?Conventioncollective
    {
        return $this->conventioncollective;
    }

    public function setConventioncollective(?Conventioncollective $conventioncollective): self
    {
        $this->conventioncollective = $conventioncollective;

        return $this;
    }
}
