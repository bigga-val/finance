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
     * @ORM\OneToOne(targetEntity=SignesVitaux::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $signes_vitaux;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

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
}
