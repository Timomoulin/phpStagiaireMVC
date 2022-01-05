<?php
class Stagiaire{
    //Les attributs
    private $idStagiaire;
    private $nom;
    private $prenom;
    private $email;
    //Les méthodes

    /**
     * Get the value of idStagiaire
     */ 
    public function getIdStagiaire()
    {
        return $this->idStagiaire;
    }

    /**
     * Set the value of idStagiaire
     *
     * @return  self
     */ 
    public function setIdStagiaire($idStagiaire)
    {
        $this->idStagiaire = $idStagiaire;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
?>