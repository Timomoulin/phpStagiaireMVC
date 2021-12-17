<?php
$action="404";
if(isset($_GET["action"])){
    $action=filter_var($_GET["action"],FILTER_SANITIZE_STRING);
}
require("model/evaluation.php");
require("model/matiere.php");
switch($action){
    case "formAjout":
        $idStagiaire=filter_var($_GET["idStagiaire"],FILTER_SANITIZE_NUMBER_INT);
        $lesMatieres=fetchAllMatiere();
        require("view/evaluation/formAjout.php");
        break;
    case "traitementAjout":
        $idStagiaire=filter_var($_POST["idStagiaire"],FILTER_SANITIZE_NUMBER_INT);
        $idMatiere=filter_var($_POST["idMatiere"],FILTER_SANITIZE_NUMBER_INT);
        $note=filter_var($_POST["note"],FILTER_SANITIZE_NUMBER_FLOAT);
        $date=filter_var($_POST["date"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $resultat=createEvaluation($note,$date,$idMatiere,$idStagiaire);
        
        break;
    default :
    require("view/404.php");
    exit;
}
?>