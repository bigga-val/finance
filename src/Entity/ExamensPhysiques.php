<?php

namespace App\Entity;

use App\Repository\ExamensPhysiquesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExamensPhysiquesRepository::class)
 */
class ExamensPhysiques
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tete_cou;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tronc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $membres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $divers;

    /**
     * @ORM\ManyToOne(targetEntity=SignesVitaux::class)
     */
    private $consultation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeteCou(): ?string
    {
        return $this->tete_cou;
    }

    public function setTeteCou(string $tete_cou): self
    {
        $this->tete_cou = $tete_cou;

        return $this;
    }

    public function getTronc(): ?string
    {
        return $this->tronc;
    }

    public function setTronc(?string $tronc): self
    {
        $this->tronc = $tronc;

        return $this;
    }

    public function getMembres(): ?string
    {
        return $this->membres;
    }

    public function setMembres(?string $membres): self
    {
        $this->membres = $membres;

        return $this;
    }

    public function getDivers(): ?string
    {
        return $this->divers;
    }

    public function setDivers(?string $divers): self
    {
        $this->divers = $divers;

        return $this;
    }

    public function getConsultation(): ?SignesVitaux
    {
        return $this->consultation;
    }

    public function setConsultation(?SignesVitaux $consultation): self
    {
        $this->consultation = $consultation;

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
