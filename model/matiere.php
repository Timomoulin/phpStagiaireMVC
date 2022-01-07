<?php
require_once("bdd.php");
require_once ("class/matiere.class.php");
/**
 * Fonction qui retourne les matieres
 * @return array|false|void
 */
function fetchAllMatiere(){

    try {
        $connex=etablirCo();
        $sql =$connex->prepare("SELECT * FROM Matiere ");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Matiere");
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
        $sql->setFetchMode(PDO::FETCH_CLASS,"Matiere");
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
        $sql =$connex->prepare("UPDATE Matiere SET nomMatiere=:nom WHERE idMatiere=:id");
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

/**
 * Permet d'ajouter une matière dans la bdd
 *
 * @param string $unNom le nom de la matière
 * @return boolean vrai si ok faux sinon
 */
function createMatiere($unNom){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("INSERT INTO matiere (nomMatiere) values(:nom)");
        $sql->bindParam(":nom",$unNom);
        $sql->execute();
        return true;


    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

function deleteMatiere($unId){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("DELETE FROM evaluation WHERE idMatiere=:id");
        $sql->bindParam(":id",$unId);
        $sql->execute();
        $sql2 =$connex->prepare("DELETE FROM matiere WHERE idMatiere=:id");
        $sql2->bindParam(":id",$unId);
        $sql2->execute();
        return true;
    }
    catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}


?>