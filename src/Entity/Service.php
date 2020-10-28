<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity=Acte::class, mappedBy="service")
     */
    private $actes;

    public function __construct()
    {
        $this->actes = new ArrayCollection();
    }

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection|Acte[]
     */
    public function getActes(): Collection
    {
        return $this->actes;
    }

    public function addActe(Acte $acte): self
    {
        if (!$this->actes->contains($acte)) {
            $this->actes[] = $acte;
            $acte->setService($this);
        }

        return $this;
    }

    public function removeActe(Acte $acte): self
    {
        if ($this->actes->removeElement($acte)) {
            // set the owning side to null (unless already changed)
            if ($acte->getService() === $this) {
                $acte->setService(null);
            }
        }

        return $this;
    }
}
