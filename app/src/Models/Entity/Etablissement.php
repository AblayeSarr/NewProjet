<?php

class Etablissement {
    private ?int $id;
    private string $nom;

    function __construct(?int $id, string $nom){
        $this->id = $id;
        $this->nom = $nom;
    }
    
    public function getId(): ?int {
         return $this->id; 
    }
    public function setId(?int $id): void { 
        $this->id = $id;
    }
    
    public function getNom(): string {
         return $this->nom = $nom; 
    }
    public function setNom(string $nom): void { 
        $this->nom = $nom;
    }
}