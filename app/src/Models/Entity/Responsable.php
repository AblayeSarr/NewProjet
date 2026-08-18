<?php

namespace App\Models\Entity;

class Responsable {

    private ?int $id;
    private string $prenom;
    private string $nom;
    private string $numero;
    private string $adresse;

    public function __construct(
        ?int $id,
        string $prenom,
        string $nom,
        string $numero,
        string $adresse
    ) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->numero = $numero;
        $this->adresse = $adresse;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

     public static function toEntity(\stdClass $obj): self {
        return new self(
            prenom: $obj->prenomresponsable,
            nom: $obj->nomresponsable,
            numero: $obj->numerotelephone,
            addresse: $odj->adresseresponsable,
        );
    }

}