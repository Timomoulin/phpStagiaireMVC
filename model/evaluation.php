<?php
require ("bdd.php");

/**
 * Fonction qui retourne une evaluation
 * @param $unId l'id de l'eval
 * @return mixed|void une evaluation (array asso)
 */
function fetchEvalById($unId){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("SELECT * FROM evaluation WHERE idEvaluation=:id ");
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
 * Fonction qui permet de recuperer les evals d'un stagiaire
 * @param $unId int id du stagiaire
 * @return array|false|void
 */
function fetchAllEvalByIdStagiaire($unId){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("SELECT * FROM evaluation WHERE idStagiaire=:id ");
        $sql->bindParam(":id",$unId);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $resultat = ($sql->fetchAll());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

/**
 * Fonction qui permet de recuperer les evals d'une matière
 * @param $unId int id de la matiere
 * @return array|false|void
 */
function fetchAllEvalByIdMatiere($unId){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("SELECT * FROM evaluation WHERE idMatiere=:id ");
        $sql->bindParam(":id",$unId);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $resultat = ($sql->fetchAll());
        return $resultat;

    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}

/**
 * Fonction qui permet d'ajouter une eval
 * @param $note int la note
 * @param $date date la date
 * @param $idMat int id de la Matiere
 * @param $idSta int id du stagiaire
 * @return bool vrai si ok, faux sinon
 */
function createEvaluation($note,$date,$idMat,$idSta){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("INSERT INTO evaluation (note,dateEvaluation,idMatiere,idStagiaire) values(:note,:date,:idM,:idS)");
        $sql->bindParam(":note",$note);
        $sql->bindParam(":dateEvaluation",$date);
        $sql->bindParam(":idM",$idMat);
        $sql->bindParam(":idS",$idSta);
        $sql->execute();
        return true;


    } catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

/**
 * Fonction qui permet de modifier un stagiaire
 * @param $idEval int
 * @param $note int
 * @param $date date
 * @param $idMat int
 * @param $idSta int
 * @return bool
 */
function updateEvaluation($idEval,$note,$date,$idMat,$idSta){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("UPDATE evaluation SET note=:note,dateEvaluation=:dateEvaluation,idMatiere=:idM,idStagiaire=:idS WHERE idEvaluation=:idE");
        $sql->bindParam(":idE",$idEval);
        $sql->bindParam(":note",$note);
        $sql->bindParam(":dateEvaluation",$date);
        $sql->bindParam(":idM",$idMat);
        $sql->bindParam(":idS",$idSta);
        $sql->execute();
        return true;
    }
    catch (PDOException $error) {
        echo $error->getMessage();
        return false;
    }
}

/**
 * fonction qui permet de supprimmer une evaluation
 * @param $unId int
 * @return bool
 */
function deleteEvaluation($unId){
    try {
        $connex=etablirCo();
        $sql =$connex->prepare("DELETE FROM evaluation WHERE idEvaluation=:id");
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