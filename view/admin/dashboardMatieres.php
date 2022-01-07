<?php
$title = "Dashboard Matiere";
ob_start();
?>
    <h1>Dashboard</h1>
<?php if(isset($_SESSION["msg"])){
    ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION["msg"]?>
    </div>
    <?php
    unset($_SESSION["msg"]);
}
elseif (isset($_SESSION["error"])){ ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION["msg"]?>
    </div>
    <?php
    unset($_SESSION["error"]);
} ?>

    <a  href="?path=matiere&action=formAjout" class="btn btn-success">Ajouter</a>
    <table class="table table_striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>

            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($lesMatieres as $uneMatiere)
        { ?>
            <tr>
                <td><?=$uneMatiere->getIdMatiere() ?></td>
                <td><?= $uneMatiere->getNomMatiere()?></td>
                <td>
                    <a href="?path=matiere&action=formModif&id=<?=$uneMatiere->getIdMatiere()?>" class="btn bg-info">Modifier</a>

                    <form action="?path=matiere&action=traitementSup" method="post">
                        <input type="hidden" name="id" value="<?=$uneMatiere->getIdMatiere()?>">
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php
$content = ob_get_clean();
require("view/template.php");
