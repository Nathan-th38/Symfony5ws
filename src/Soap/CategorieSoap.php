<?php

namespace App\Soap;

class CategorieSoap
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
     * @param $id
     * @param $libelle
     * @param $texte
     */
    public function __construct($id, $libelle, $texte)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->texte = $texte;
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
}
