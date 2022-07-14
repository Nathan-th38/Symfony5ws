<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Doctrine\ORM\Mapping as ORM;

/**
 * LigneCommande
 *
 * @ORM\Table(name="ligne_commande", indexes={@ORM\Index(name="IDX_3170B74BF347EFB", columns={"produit_id"}), @ORM\Index(name="IDX_3170B74B9AF8E3A3", columns={"id_commande_id"})})
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"lignecommande"},"enable_max_depth"=true})
 */
class LigneCommande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"produit","commande","lignecommande"})
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     * @Groups({"produit","commande","lignecommande"})
     */
    private $quantite;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     * @Groups({"produit","commande","lignecommande"})
     */
    private $prix;

    /**
     * @var Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commande_id", referencedColumnName="id")
     * })
     * @ApiSubresource
     * @Groups({"produit","lignecommande"})
     * @MaxDepth(1)
     */
    private $idCommande;

    /**
     * @var Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produit_id", referencedColumnName="id")
     * })
     * @ApiSubresource
     * @Groups({"commande","lignecommande"})
     * @MaxDepth(1)
     */
    private $produit;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getQuantite(): int
    {
        return $this->quantite;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }

    /**
     * @return int
     */
    public function getPrix(): int
    {
        return $this->prix;
    }

    /**
     * @param int $prix
     */
    public function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return Commande
     */
    public function getIdCommande(): Commande
    {
        return $this->idCommande;
    }

    /**
     * @param Commande $idCommande
     */
    public function setIdCommande(Commande $idCommande): void
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return Produit
     */
    public function getProduit(): Produit
    {
        return $this->produit;
    }

    /**
     * @param Produit $produit
     */
    public function setProduit(Produit $produit): void
    {
        $this->produit = $produit;
    }

}
