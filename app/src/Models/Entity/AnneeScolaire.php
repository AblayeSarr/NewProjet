<?php

class AnneeScolaire {
   private ?int $id;
   private string $annee; 

public function __construct(?int $id, string $annee){
    $this->id = $id;
    $this->annee = $annee;
}

 public function getId(): ?int{
    return $this->id;
}

 public function setId(): void{
    $this->id=$id;
}

public function setAnnee():void{
    $this->annee = $annee;
}

public function getAnnee():string{
    return $this->annee;
}

}

