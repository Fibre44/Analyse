<?php

namespace App\Entity;

use App\Repository\PourcentagemaintienRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PourcentagemaintienRepository::class)
 */
class Pourcentagemaintien
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Maintiendesalaire::class, inversedBy="pourcentagemaintiens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Maintiensalaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrejours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pourcentage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaintiensalaire(): ?Maintiendesalaire
    {
        return $this->Maintiensalaire;
    }

    public function setMaintiensalaire(?Maintiendesalaire $Maintiensalaire): self
    {
        $this->Maintiensalaire = $Maintiensalaire;

        return $this;
    }

    public function getNbrejours(): ?int
    {
        return $this->nbrejours;
    }

    public function setNbrejours(int $nbrejours): self
    {
        $this->nbrejours = $nbrejours;

        return $this;
    }

    public function getPourcentage(): ?string
    {
        return $this->pourcentage;
    }

    public function setPourcentage(string $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }
}
