<?php

namespace App\Entity;

use App\Repository\AntecedentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AntecedentRepository::class)
 */
class Antecedent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=SignesVitaux::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $signes_vitaux;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $medical;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $chirurgical;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $familial;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $colateral;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSignesVitaux(): ?SignesVitaux
    {
        return $this->signes_vitaux;
    }

    public function setSignesVitaux(SignesVitaux $signes_vitaux): self
    {
        $this->signes_vitaux = $signes_vitaux;

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

    public function getMedical(): ?string
    {
        return $this->medical;
    }

    public function setMedical(?string $medical): self
    {
        $this->medical = $medical;

        return $this;
    }

    public function getChirurgical(): ?string
    {
        return $this->chirurgical;
    }

    public function setChirurgical(?string $chirurgical): self
    {
        $this->chirurgical = $chirurgical;

        return $this;
    }

    public function getFamilial(): ?string
    {
        return $this->familial;
    }

    public function setFamilial(?string $familial): self
    {
        $this->familial = $familial;

        return $this;
    }

    public function getColateral(): ?string
    {
        return $this->colateral;
    }

    public function setColateral(?string $colateral): self
    {
        $this->colateral = $colateral;

        return $this;
    }

}
