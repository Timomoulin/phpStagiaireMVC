<?php

$action = "404";
if (isset($_GET["action"])) {
    $action = filter_var($_GET["action"], FILTER_SANITIZE_STRING);
}
require("model/matiere.php");
switch ($action) {
    case "formAjout":
        require "view/matiere/formAjout.php";
        break;
    case "traitementAjout":
        $nom=filter_var($_POST["nom"],FILTER_SANITIZE_STRING);
        $resultat=createMatiere($nom);
        
        if($resultat==true){
            $_SESSION["msg"]="Ajout réusi";
            header("location:?path=admin&action=matieres");
        }
        else{
            $_SESSION["error"]="Echec de l'ajout";
            header("location:?path=matiere&action=formAjout");
        }
        
        break;
    case "formModif":
        $idMat=filter_var($_GET["id"],FILTER_SANITIZE_NUMBER_INT);
        $uneMatiere=fetchMatiereById($idMat);
        require "view/matiere/formModif.php";
        break;
    case "traitementModif":
        $idMat=filter_var($_POST["idMatiere"],FILTER_SANITIZE_NUMBER_INT);
        $nom=filter_var($_POST["nom"],FILTER_SANITIZE_STRING);
        $resultat=updateMatiere($idMat,$nom);

        if($resultat==true){
            $_SESSION["msg"]="Modification réussite";
            header("location:?path=admin&action=matieres");
        }
        else{
            $_SESSION["error"]="Echec de la modification";
            header("location:?path=matiere&action=formModif&id=$idMat");
        }
      break;
    case"traitementSup":
        $idMat=filter_var($_GET["id"],FILTER_SANITIZE_NUMBER_INT);
        //@TODO DELETEMATIERE dans matiere.php
        break;
    default :
        require("view/404.php");
        exit;
}