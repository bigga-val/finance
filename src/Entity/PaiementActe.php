<?php

namespace App\Entity;

use App\Repository\PaiementActeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementActeRepository::class)
 */
class PaiementActe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=patient::class)
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity=acte::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $acte;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_paiement;

    /**
     * @ORM\ManyToOne(targetEntity=user::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?patient
    {
        return $this->patient;
    }

    public function setPatient(?patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getActe(): ?acte
    {
        return $this->acte;
    }

    public function setActe(?acte $acte): self
    {
        $this->acte = $acte;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->date_paiement;
    }

    public function setDatePaiement(\DateTimeInterface $date_paiement): self
    {
        $this->date_paiement = $date_paiement;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
