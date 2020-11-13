<?php

namespace App\Entity;

use App\Repository\AnamneseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnamneseRepository::class)
 */
class Anamnese
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="text")
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity=SignesVitaux::class)
     */
    private $consultation;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
