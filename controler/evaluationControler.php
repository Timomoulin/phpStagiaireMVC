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
    default :
    require("view/404.php");
    exit;
}
?>