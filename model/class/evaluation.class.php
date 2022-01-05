<?php
class Evaluation{
    private $idEvaluation;
    private $note;
    private $dateEvaluation;
    private $idMatiere;
    private $idStagiaire;

    /**
     * Get the value of idEvaluation
     */ 
    public function getIdEvaluation()
    {
        return $this->idEvaluation;
    }

    /**
     * Set the value of idEvaluation
     *
     * @return  self
     */ 
    public function setIdEvaluation($idEvaluation)
    {
        $this->idEvaluation = $idEvaluation;

        return $this;
    }

    /**
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote($note)
    {
        if($note>=0&&$note<=20){
              $this->note = $note;
        }
      

        return $this;
    }

    /**
     * Get the value of dateEvaluation
     */ 
    public function getDateEvaluation()
    {
        return $this->dateEvaluation;
    }

    /**
     * Set the value of dateEvaluation
     *
     * @return  self
     */ 
    public function setDateEvaluation($dateEvaluation)
    {
        $this->dateEvaluation = $dateEvaluation;

        return $this;
    }

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
}
?>