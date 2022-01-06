<?php
require_once ("bdd.php");
require_once ("class/stagiaire.class.php");
/**
 * Fonction qui retourne tout les stagiaires de la table
 *
 * @return array|false $resultat un array qui contient les stagiaires
 */
function fetchAllStagiaire(){

    try {
        $connex=etablirCo();
        $sql =$connex->prepare("SELECT * FROM stagiaire ORDER BY idStagiaire");

        $sql->execute();

        $sql->setFetchMode(PDO::FETCH_CLASS,"Stagiaire");
        $resultat = $sql->fetchAll();
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

/**
 * Fonction qui retourne les infos d'un seul stagiaire
 *
 * @param int $unId l'id du stagiaire
 * @return array|false $resultat les infos du stagiaire
 */
function fetchStagiaireById($unId){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("SELECT * FROM stagiaire WHERE idStagiaire=:id ");
        $sql->bindParam(":id",$unId);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_CLASS,"Stagiaire");
        $resultat = ($sql->fetch());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

/**
 * Fonction qui permet d'ajouter un stagiaire
 *
 * @param string $unNom
 * @param string $unPrenom
 * @param string $unEmail
 * @return boolean
 */
function createStagiaire($unNom,$unPrenom,$unEmail){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("INSERT INTO stagiaire values(null,:nom,:prenom,:email)");
        $sql->bindParam(":nom",$unNom);
        $sql->bindParam(":prenom",$unPrenom);
        $sql->bindParam(":email",$unEmail);
        $sql->execute();
        return true;


    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

/**
 * Fonction qui permet de modifier un stagiaire dans la bdd
 *
 * @param int $unId
 * @param string $unNom
 * @param string $unPrenom
 * @param string $unEmail
 * @return boolean
 */
function updateStagiaire($unId,$unNom,$unPrenom,$unEmail){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("UPDATE stagiaire SET nom=:nom,prenom=:prenom,email=:email WHERE idStagiaire=:id");
        $sql->bindParam(":nom",$unNom);
        $sql->bindParam(":prenom",$unPrenom);
        $sql->bindParam(":email",$unEmail);
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
 * Fonction qui supprime un stagiaire
 *
 * @param int $unId l'id du stagiaire
 * @return boolean
 */
function deleteStagiaire($unId){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("DELETE FROM evaluation WHERE idStagiaire=:id");
        $sql->bindParam(":id",$unId);
        $sql->execute();
        $sql2 =$connex->prepare("DELETE FROM stagiaire WHERE idStagiaire=:id");
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