<?php
$action="admin";
if(isset($_GET["action"]))
{
    $action=filter_var($_GET["action"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
require("model/stagiaire.php");
require ("model/matiere.php");
switch($action){
    case"admin":
        require("view/admin/pageAdmin.php");
    break;
    case "dashboard":
        $lesStagiaires=fetchAllStagiaire();
        require("view/admin/dashboard.php");
    break;
    case "matieres":
        $lesMatieres=fetchAllMatiere();
        require ("view/admin/dashboardMatieres.php");
        break;
    default:
    require("view/404.php");
}
?>