<?php
session_start();

//Valeur par défaut de $path
$path="main";
if(isset($_GET["path"])){
    //Si la clé path existe dans la superglobale GET
    // alors $path prend ca valeur
     $path=filter_var($_GET["path"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   
}

switch($path)
{
    case "main":
        require('controler/controler.php');
        break;
    case "admin":
        require("controler/adminControler.php");
        break;
    case "stagiaire":
        require("controler/stagiaireControler.php");
        break;
    default :
    require "view/404.php";
}

?>