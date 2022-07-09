<?php

namespace App\Soap;

class ProduitSoap
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $libelle;
    /**
     * @var string
     */
    public $texte;
    /**
     * @var int
     */
    public $prix;

    /**
     * @param $id
     * @param $libelle
     * @param $texte
     * @param $prix
     */
    public function __construct($id, $libelle, $texte, $prix)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->texte = $texte;
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * @param mixed $texte
     */
    public function setTexte($texte): void
    {
        $this->texte = $texte;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }



}
