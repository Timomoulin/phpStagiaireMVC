<?php
$title="Formualaire Stagiaire";
ob_start();
?>
<div class="container">
  
<h1 class="text-center">Formualire Stagiaire</h1>
<form action="?path=stagiaire&action=traitementAjout" method="post">
    <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <!-- Affichage si erreur-->
        <?php
        if(isset($_SESSION["error"])){
            ?>
            <div class="alert alert-danger">
                <?=$_SESSION["error"]?>
            </div>
        <?php }
        // On supprime le msg dans la session
        unset($_SESSION["error"])
        ?>
        <div class="row my-2">
            <label for="inputPrenom">Prenom</label>
            <input class="form-control" name="prenom" id="inputPrenom" type="text" required minlength="2" >
        </div>
        <div class="row my-2">
            <label for="inputNom">Nom</label>
            <input class="form-control" name="nom" id="inputNom" type="text" required minlength="2" >
        </div>
        <div class="row my-2">
            <label for="inputEmail">Email</label>
            <input class="form-control" name="email" id="inputEmail" type="email"  required>
        </div>

    <div class="row my-2">
        <button class="btn btn-primary w-25">Envoyer</button>
    </div>
    </div>
</form>
</div>
    <!--Script de verification des formulaires-->
    <script src="./asset/js/formVerif.js"></script>
<?php 
$content= ob_get_clean();
require("view/template.php");