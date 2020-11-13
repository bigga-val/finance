<?php

namespace App\Entity;

use App\Repository\ComplementsAnamneseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComplementsAnamneseRepository::class)
 */
class ComplementsAnamnese
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity=SignesVitaux::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $consultation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getConsultation(): ?SignesVitaux
    {
        return $this->consultation;
    }

    public function setConsultation(?SignesVitaux $consultation): self
    {
        $this->consultation = $consultation;

        return $this;
    }
}
