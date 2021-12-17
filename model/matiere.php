<?php
require_once("bdd.php");

/**
 * Fonction qui retourne les matieres
 * @return array|false|void
 */
function fetchAllMatiere(){

    try {
        $connex=etablirCo();
        $sql =$connex->prepare("SELECT * FROM Matiere ");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $resultat = ($sql->fetchAll());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

/**
 * Fonction qui retourne une matiere
 * @param $unId int id da la matiere
 * @return mixed|void
 */
function fetchMatiereById($unId){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("SELECT * FROM Matiere WHERE idMatiere=:id ");
        $sql->bindParam(":id",$unId);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}


/**
 * Fonction de modification d'une matiere
 * @param $unId int id de la matiere
 * @param $unNom string nom de la matiere
 * @return bool
 */
function updateMatiere($unId,$unNom){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("UPDATE Matiere SET nom=:nom WHERE idMatiere=:id");
        $sql->bindParam(":nom",$unNom);
        $sql->bindParam(":id",$unId);
        $sql->execute();
        return true;
    }
    catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}


?>