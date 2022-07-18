<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\ExistsFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="IDX_6EEAA67DA76ED395", columns={"user_id"})})
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"commande"},"enable_max_depth"=true}, denormalizationContext={"groups"={"commandeWrite"}})
 * @ApiFilter(RangeFilter::class, properties={"id"})
 * @ApiFilter(DateFilter::class, properties={"dateCommande"})
 * @ApiFilter(ExistsFilter::class, properties={"user"})
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"produit","commande","lignecommande","commandeWrite","lignecommandeWrite"})
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commande", type="date", nullable=false)
     * @NotNull(message="La date ne peut être null")
     * @Groups({"commande","lignecommande","commandeWrite"})
     */
    private $dateCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255, nullable=false)
     * @NotBlank(message="Statut non renseigné")
     * @Groups({"commande","lignecommande","commandeWrite"})
     */
    private $statut;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\LigneCommande", mappedBy="idCommande", cascade={"remove"})
     * @Groups({"commande"})
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
     * @return \DateTime
     */
    public function getDateCommande(): \DateTime
    {
        return $this->dateCommande;
    }

    /**
     * @param \DateTime $dateCommande
     */
    public function setDateCommande(\DateTime $dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * @return string
     */
    public function getStatut(): string
    {
        return $this->statut;
    }

    /**
     * @param string $statut
     */
    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
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

    public function remove(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommande->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getIdCommande() === $this) {
                $ligneCommande->setIdCommande(null);
            }
        }
        return $this;
    }
}
