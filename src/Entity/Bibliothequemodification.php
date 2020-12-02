<?php

namespace App\Entity;

use App\Repository\BibliothequemodificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BibliothequemodificationRepository::class)
 */
class Bibliothequemodification
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
    private $demande;

    /**
     * @ORM\Column(type="integer")
     */
    private $ancienid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ancienvaleur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nouvellevaleur;

    /**
     * @ORM\ManyToOne(targetEntity=Bibliothequeccn::class, inversedBy="bibliothequemodifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bibliothequeccn;

    public function __construct($ancienid,$ancienvaleur)
    {
        $this->ancienid = $ancienid;
        $this->ancienvaleur = $ancienvaleur;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDemande(): ?string
    {
        return $this->demande;
    }

    public function setDemande(string $demande): self
    {
        $this->demande = $demande;

        return $this;
    }

    
    public function getAncienid(): ?int
    {
        return $this->ancienid;
    }

    public function setAncienid(int $ancienid): self
    {
        $this->ancienid = $ancienid;

        return $this;
    }

    public function getAncienvaleur(): ?string
    {
        return $this->ancienvaleur;
    }

    public function setAncienvaleur(string $ancienvaleur): self
    {
        $this->ancienvaleur = $ancienvaleur;

        return $this;
    }

    public function getNouvellevaleur(): ?string
    {
        return $this->nouvellevaleur;
    }

    public function setNouvellevaleur(?string $nouvellevaleur): self
    {
        $this->nouvellevaleur = $nouvellevaleur;

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
}
