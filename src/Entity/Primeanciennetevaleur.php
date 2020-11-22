<?php

namespace App\Entity;

use App\Repository\PrimeanciennetevaleurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrimeanciennetevaleurRepository::class)
 */
class Primeanciennetevaleur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Primeanciennetepopulation::class, inversedBy="primeanciennetevaleurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $primeanciennetepopulation;

    /**
     * @ORM\Column(type="integer")
     */
    private $anciennetemois;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pourcentage;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $signe;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etendu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrimeanciennetepopulation(): ?Primeanciennetepopulation
    {
        return $this->primeanciennetepopulation;
    }

    public function setPrimeanciennetepopulation(?Primeanciennetepopulation $primeanciennetepopulation): self
    {
        $this->primeanciennetepopulation = $primeanciennetepopulation;

        return $this;
    }

    public function getAnciennetemois(): ?int
    {
        return $this->anciennetemois;
    }

    public function setAnciennetemois(int $anciennetemois): self
    {
        $this->anciennetemois = $anciennetemois;

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

    public function getSigne(): ?string
    {
        return $this->signe;
    }

    public function setSigne(string $signe): self
    {
        $this->signe = $signe;

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
}
