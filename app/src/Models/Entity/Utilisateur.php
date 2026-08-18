<?php

namespace App\Models\Entity;

class Utilisateur {

    private ?int $id;
    private string $prenom;
    private string $nom;
    private string $login;
    private string $password;
    private Role $role;

    public function __construct(
        ?int $id,
        string $prenom,
        string $nom,
        string $login,
        string $password,
        Role $role
    ) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->login = $login;
        $this->password = $password;
        $this->role = $role;
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

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }

     public static function toEntity(\stdClass $obj): self
    {
        return new self(
            prenom : $obj->prenomutilisateur,
            nom : $obj->nomutilisateur,
            login: $obj->login,
            password: $obj->password,
            role: Role::toEntity($obj)
        );
    }
}