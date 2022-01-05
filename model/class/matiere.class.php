<?php
class Matiere{
    private $idMatiere;
    private $nomMatiere;
    

    /**
     * Get the value of idMatiere
     */ 
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    /**
     * Set the value of idMatiere
     *
     * @return  self
     */ 
    public function setIdMatiere($idMatiere)
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }

    /**
     * Get the value of nomMatiere
     */ 
    public function getNomMatiere()
    {
        return $this->nomMatiere;
    }

    /**
     * Set the value of nomMatiere
     *
     * @return  self
     */ 
    public function setNomMatiere($nomMatiere)
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }
}