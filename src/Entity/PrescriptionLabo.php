<?php

namespace App\Entity;

use App\Repository\PrescriptionLaboRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrescriptionLaboRepository::class)
 */
class PrescriptionLabo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=SignesVitaux::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $consultation;

    /**
     * @ORM\ManyToOne(targetEntity=SingleExamenLabo::class)
     */
    private $single_examen_labo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $created_by;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $updated_by;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $resultat_examen;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSingleExamenLabo(): ?SingleExamenLabo
    {
        return $this->single_examen_labo;
    }

    public function setSingleExamenLabo(?SingleExamenLabo $single_examen_labo): self
    {
        $this->single_examen_labo = $single_examen_labo;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->created_by;
    }

    public function setCreatedBy(?User $created_by): self
    {
        $this->created_by = $created_by;

        return $this;
    }

    public function getUpdatedBy(): ?User
    {
        return $this->updated_by;
    }

    public function setUpdatedBy(?User $updated_by): self
    {
        $this->updated_by = $updated_by;

        return $this;
    }

    public function getResultatExamen(): ?string
    {
        return $this->resultat_examen;
    }

    public function setResultatExamen(?string $resultat_examen): self
    {
        $this->resultat_examen = $resultat_examen;

        return $this;
    }
}
