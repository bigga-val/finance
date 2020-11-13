<?php

namespace App\Entity;

use App\Repository\SingleExamenLaboRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SingleExamenLaboRepository::class)
 */
class SingleExamenLabo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $unite_si;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $unite_traditionnelle;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_unitaire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity=ExamensLabo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $examen_labo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getUniteSi(): ?string
    {
        return $this->unite_si;
    }

    public function setUniteSi(string $unite_si): self
    {
        $this->unite_si = $unite_si;

        return $this;
    }

    public function getUniteTraditionnelle(): ?string
    {
        return $this->unite_traditionnelle;
    }

    public function setUniteTraditionnelle(?string $unite_traditionnelle): self
    {
        $this->unite_traditionnelle = $unite_traditionnelle;

        return $this;
    }

    public function getPrixUnitaire(): ?float
    {
        return $this->prix_unitaire;
    }

    public function setPrixUnitaire(float $prix_unitaire): self
    {
        $this->prix_unitaire = $prix_unitaire;

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

    public function getExamenLabo(): ?ExamensLabo
    {
        return $this->examen_labo;
    }

    public function setExamenLabo(?ExamensLabo $examen_labo): self
    {
        $this->examen_labo = $examen_labo;

        return $this;
    }
}
