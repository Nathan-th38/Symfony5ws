<?php

namespace App\Soap;

    /**
     * Class SecteurSoap
     * @package    \App\Soap
     * @author     MMF
     */
class SecteurSoap
{
    /**
     * @var int $id id du secteur
     */
    public $id;

    /**
     * @var string $libelle libelle du secteur
     */
    public $libelle;

    /**
     * SecteurSoap constructor.
     * @param int $id
     * @param string $libelle
     */
    public function __construct($id, string $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;
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
}
