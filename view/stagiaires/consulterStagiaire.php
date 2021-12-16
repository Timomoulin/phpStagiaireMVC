<?php
$title="Page Stagiaire";
ob_start();
?>
<h1>Page Stagiaire</h1>
<div>
    Nom : <?=$unStagiaire["nom"]?>
    <br>
    Prenom : <?=$unStagiaire["prenom"]?>
    <br>
    Email : <?=$unStagiaire["email"]?>
    <br>
</div>
<?php 
$content=ob_get_clean();
require("view/template.php");



