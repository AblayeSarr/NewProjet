<?php

class Eleve {
    private ?int $id;
    private Responsable $responsable;
    private string $matricule;
    private string $prenom;
    private string $nom;
    private ?string $numero;
    private Statut $statut;
    private string $adresse;

    public function __construct(
        ?int $id,
        Responsable $responsable,
        string $matricule,
        string $prenom,
        string $nom,
        ?string $numero,
        Statut $statut,
        string $adresse
    ){
        $this->id = $id;
        $this->responsable = $responsable;
        $this->matricule = $matricule;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->statut = $statut;
        $this->numero = $numero;
        $this->adresse = $adresse;
    }

    public function getId(): ?int {
         return $this->id; 
    }
    public function setId(?int $id): void { 
        $this->id = $id;
    }

     public function geResponsable(): responsable {
         return $this->responsable; 
    }
    public function setResponsable($responsable): void { 
        $this->responsable = $responsable;
    }

     public function getMatricule(): string {
         return $this->matricule; 
    }
    public function setMatricule(string $matricule): void { 
        $this->matricule = $matricule;
    }

    public function getPrenom(): string {
         return $this->prenom = $prenom; 
    }
    public function setPrenom(string $prenom): void { 
        $this->prenom = $prenom;
    }

    public function getNom(): string {
         return $this->nom = $nom; 
    }
    public function setNom(string $nom): void { 
        $this->nom = $nom;
    }

    public function getStatut(): string { 
        return $this->statut;
    }
    public function setStatut(string $statut): void { 
        $this->statut = $statut; 
    }

    public function getNumero(): string { 
        return $this-> numero;
    }
    public function setNumrero(string $numero): void { 
        $this->numero = $numero; 
    }

    public function getAdresse(): string { 
        return $this->adresse;
    }
    public function setAdresse(string $adresse): void { 
        $this->adresse = $adresse; 
    }

    public function getNomComplet(): string{
        return trim($this->prenom . ' ' . $this->nom);
    }
}

  