<?php

namespace App\Soap;

    /**
     * Class StructureSoap
     * @package    \App\Soap
     * @author     MMF
     */
class StructureSoap
{
    /**
     * @var int $id id de la structure
     */
    public $id;

    /**
     * @var string $nom nom de la structure
     */
    public $nom;

       /**
     * @param int $id
     * @param string $nom
     */
    public function __construct(int $id, string $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
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
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
}