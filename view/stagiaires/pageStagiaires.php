<?php
$title="Stagiaires";
ob_start();?>
<h1>Stagiaires</h1>
<div class="row justify-content-center gy-2">
<?php foreach($lesStagiaires as $unStagiaire){?>
<div class="card mx-2" style="width: 18rem;">
  <div class="card-body">
    
    <h5 class="card-title"><?=mb_strtoupper( $unStagiaire->getNom()); ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?=ucfirst($unStagiaire->getPrenom())?></h6>
    <p class="card-text">Email : <?=$unStagiaire->getEmail()?></p>
    <a href="?path=stagiaire&action=stagiaire&id=<?=$unStagiaire->getIdStagiaire()?>" class="btn btn-primary">Consulter</a>
  </div>
</div>
<?php }?>
</div>


<?php 
$content=ob_get_clean();
require("view/template.php");
?>
