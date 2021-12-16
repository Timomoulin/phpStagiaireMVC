<?php

$action="stagiaires";
if(isset($_GET["action"])){
    $action=filter_var($_GET["action"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
require("model/stagiaire.php");

switch($action){
    //Affiche les stagiaires
    case "stagiaires":

        $lesStagiaires=fetchAllStagiaire();
        require("view/stagiaires/pageStagiaires.php");
    break;
    //Affiche un stagiaire
    case "stagiaire":
        $id=filter_var($_GET["id"],FILTER_SANITIZE_NUMBER_INT);
        $unStagiaire=fetchStagiaireById($id);
        require("view/stagiaires/consulterStagiaire.php");
    break;
    case "formAjout":
        require("view/stagiaires/formAjout.php");
        break;
    case "traitementAjout":
        $nom=filter_var($_POST["nom"],FILTER_SANITIZE_STRING);
        $prenom=filter_var($_POST["prenom"],FILTER_SANITIZE_STRING);
        $email=filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
        //La fonction retourne vrai si l'operation est réusie faux sinon
        $resultat=createStagiaire($nom,$prenom,$email);

        if($resultat){
            $_SESSION["msg"]="Ajout réusie";
            header("location:?path=admin&action=dashboard");
        }
        else{
            $_SESSION["error"]="Echec de la modification";
            header("location:?path=stagiaire&action=formAjout");
        }
        break;
    case "formModif":
        $id=filter_var($_GET["id"],FILTER_SANITIZE_STRING);
        $leStagiaire=fetchStagiaireById($id);
        require ("view/stagiaires/formModif.php");
        break;
    case "traitementModif":
        $id=filter_var($_POST["id"],FILTER_SANITIZE_NUMBER_INT);
        $nom=filter_var($_POST["nom"],FILTER_SANITIZE_STRING);
        $prenom=filter_var($_POST["prenom"],FILTER_SANITIZE_STRING);
        $email=filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);

        //La fonction retourne vrai si l'operation est réusie faux sinon
        $resultat=updateStagiaire($id,$nom,$prenom,$email);

        if($resultat){
            $_SESSION["msg"]="Modification réussite";
            header("location:?path=admin&action=dashboard");
        }
        else{
            $_SESSION["error"]="Echec de la modification";
            header("location:?path=stagiaire&action=formModif?id="+$id);
        }
        break;
    case "traitementSup":
        $id=filter_var($_POST["id"],FILTER_SANITIZE_NUMBER_INT);
        $resultat=deleteStagiaire($id);
        if($resultat){
            $_SESSION["msg"]="Suppression réussite";
            header("location:?path=admin&action=dashboard");
        }
        else{
            $_SESSION["error"]="Echec de la suppression";
            header("location:?path=admin&action=dashboard");
        }
    break;
    default:
    require("view/404.php");

}

?>