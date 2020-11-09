<?php

namespace App\Entity;

use App\Repository\SignesVitauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SignesVitauxRepository::class)
 */
class SignesVitaux
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;





    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;



    /**
     * @ORM\Column(type="boolean")
     */
    private $active;



    /**
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $created;



    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $patient;



    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tension_arterielle;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $poids;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $temperature;

    /**
     * @ORM\ManyToOne(targetEntity=Cabinet::class)
     */
    private $cabinet;








    public function getId(): ?int
    {
        return $this->id;
    }






    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): ?self
    {
        $this->created_at = $created_at;

        return $this;
    }




    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): ?self
    {
        $this->active = $active;

        return $this;
    }



    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): ?self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }



    public function getTensionArterielle(): ?float
    {
        return $this->tension_arterielle;
    }

    public function setTensionArterielle(?float $tension_arterielle): self
    {
        $this->tension_arterielle = $tension_arterielle;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(?float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(?float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getCabinet(): ?Cabinet
    {
        return $this->cabinet;
    }

    public function setCabinet(?Cabinet $cabinet): self
    {
        $this->cabinet = $cabinet;

        return $this;
    }





}
