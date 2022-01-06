<?php
$title = "Dashboard";
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

<a  href="?path=stagiaire&action=formAjout" class="btn btn-success">Ajouter</a>
<table class="table table_striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($lesStagiaires as $unStagiaire)
        { ?>
        <tr>
            <td><?=$unStagiaire->getNom() ?></td>
            <td><?= $unStagiaire->getPrenom()?></td>
            <td><?= $unStagiaire->getEmail()?></td>
            <td>
                <a href="?path=stagiaire&action=formModif&id=<?=$unStagiaire->getIdStagiaire()?>" class="btn bg-info">Modifier</a>

                <form action="?path=stagiaire&action=traitementSup" method="post">
                    <input type="hidden" name="id" value="<?=$unStagiaire->getIdStagiaire()?>">
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
