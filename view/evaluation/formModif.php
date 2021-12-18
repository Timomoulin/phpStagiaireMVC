<?php
$title="Formualaire Evaluation";
ob_start();
?>
<div class="container">
  
<h1 class="text-center">Formualire Evaluation</h1>
<form action="?path=evaluation&action=traitementModif" method="post" novalidate>
<input type="hidden" name="idEval" readonly required value="<?=$idEval?>">    
<input type="hidden" name="idStagiaire" readonly required value="<?=$uneEval["idStagiaire"]?>">
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
            <label for="inputDate">Date</label>
            <input class="form-control" name="date" id="inputdate" type="date" required min="2021-01-01" value="<?=$uneEval["dateEvaluation"]?>" >
        </div>
        <div class="row my-2">
            <label for="inputNote">Note</label>
            <input class="form-control" name="note" id="inputNote" type="number" required step="0.01" min="0" max="20" value="<?=$uneEval["note"]?>">
        </div>
        <div class="row my-2">
            <label for="inputMatiere">Matiere</label>
           <select class="form-select" name="idMatiere" id="inputMatiere" required>
              
               <?php foreach($lesMatieres as $uneMatiere){ ?>
                <option <?php if($uneMatiere["idMatiere"]==$uneEval["idMatiere"]){ echo"selected ";}?> value="<?=$uneMatiere["idMatiere"]?>"><?=$uneMatiere["nomMatiere"]?></option>
                <?php }?>
           </select>
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