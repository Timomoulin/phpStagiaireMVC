<?php
$title="Page Stagiaire";
require("model/matiere.php");
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
<div class="container">
    <a href="?path=evaluation&action=formAjout&idStagiaire=<?=$unStagiaire["idStagiaire"]?>" class="btn btn-success">Ajouter une évaluation</a>
    <table class="table table-striped">
        <theader>
            <tr>
                <th>Date</th>
                <th>Matiere</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </theader>
        <tbody>
            <?php foreach($lesEvaluations as $uneEval){?>
            <tr>
                <td><?=$uneEval["dateEvaluation"]?></td>
                <td><?=$uneEval["nomMatiere"]?></td>
                <td><?=$uneEval["note"]?></td>
                <td>
                    <a href="" class="btn btn-info">Modifier</a>
                    <form action="" method="post">
                        <input type="hidden" name="id" readonly value="<?=$uneEval["idEvaluation"]?>">
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php 
$content=ob_get_clean();
require("view/template.php");



