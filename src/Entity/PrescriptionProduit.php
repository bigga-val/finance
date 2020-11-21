<?php

namespace App\Entity;

use App\Repository\PrescriptionProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrescriptionProduitRepository::class)
 */
class PrescriptionProduit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class)
     */
    private $produit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite_prescrite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombre_jours;



    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $created_by;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $update_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $updated_by;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getQuantitePrescrite(): ?int
    {
        return $this->quantite_prescrite;
    }

    public function setQuantitePrescrite(?int $quantite_prescrite): self
    {
        $this->quantite_prescrite = $quantite_prescrite;

        return $this;
    }

    public function getNombreProduitJour(): ?int
    {
        return $this->nombre_produit_jour;
    }

    public function setNombreProduitJour(?int $nombre_produit_jour): self
    {
        $this->nombre_produit_jour = $nombre_produit_jour;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(?\DateTimeInterface $update_at): self
    {
        $this->update_at = $update_at;

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
}
