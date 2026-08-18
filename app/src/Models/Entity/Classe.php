<?php

class Classe {

      private ?int $id;
      private Etablissement $etablissement;
      private string $nom;

      function __construct(?int $id, Etablissement $etablissement, string $nom){
        $this->id = $id;
        $this->etablissement = $etablissement;
        $this->nom = $nom;
      }

    public function getId(): ?int {
         return $this->id; 
    }
    public function setId(?int $id): void { 
        $this->id = $id;
    }

    public function getEtablissement(): etablissement {
         return $this->etablissement; 
    }
    public function setEtablissement(?int $etablissement): void { 
        $this->id = $etablissement;
    }

     public function getNom(): string {
         return $this->nom; 
    }
    public function setNom(string $nom): void { 
        $this->nom = $nom;
    }

}