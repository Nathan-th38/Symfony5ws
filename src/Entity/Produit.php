<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="IDX_29A5EC27BCF5E72D", columns={"categorie_id"})})
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"produit"},"enable_max_depth"=true}, denormalizationContext={"groups"={"produitWrite"}})
 * @ApiFilter(SearchFilter::class, properties={"libelle": "partial"})
 * @ApiFilter(RangeFilter::class, properties={"prix"})
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"produit","lignecommande","produitWrite","lignecommandeWrite"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     * @NotBlank(message="Libellé non renseigné")
     * @Groups({"produit","lignecommande","produitWrite"})
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=255, nullable=false)
     * @Groups({"produit","lignecommande","produitWrite"})
     */
    private $texte;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     * @NotNull(message="Le prix ne peut être null")
     * @Groups({"produit","lignecommande","produitWrite"})
     */
    private $prix;

    /**
     * @var Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     * })
     */
    private $categorie;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\LigneCommande", mappedBy="produit")
     * @Groups({"produit"})
     * @MaxDepth(1)
     */
    private $ligneCommande;

    public function __construct()
    {
        $this->ligneCommande = new ArrayCollection();
    }


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
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @return string
     */
    public function getTexte(): string
    {
        return $this->texte;
    }

    /**
     * @param string $texte
     */
    public function setTexte(string $texte): void
    {
        $this->texte = $texte;
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
     * @return Categorie
     */
    public function getCategorie(): Categorie
    {
        return $this->categorie;
    }

    /**
     * @param Categorie $categorie
     */
    public function setCategorie(Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return Collection
     */
    public function getLigneCommande(): Collection
    {
        return $this->ligneCommande;
    }

    /**
     * @param Collection $ligneCommande
     */
    public function setLigneCommande(Collection $ligneCommande): void
    {
        $this->ligneCommande = $ligneCommande;
    }
}
