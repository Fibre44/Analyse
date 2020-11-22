<?php

namespace App\Entity;

use App\Repository\MessageanomalieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageanomalieRepository::class)
 */
class Messageanomalie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Anomalierubrique::class, inversedBy="messageanomalies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anomalie;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $auteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnomalie(): ?Anomalierubrique
    {
        return $this->anomalie;
    }

    public function setAnomalie(?Anomalierubrique $anomalie): self
    {
        $this->anomalie = $anomalie;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }
}
