<?php
$title="Formulaire de contact";
ob_start();?>
<div class="row justify-content-center">
<h1 class="col-4">Formulaire de contact</h1>
</div>
<form action="" class="my-3" method="post">
    <div class="row col-8 mx-auto">
        <div class="col-3">
            <label for="">Email</label>
        </div>
        <div class="col-9">
            <input type="email" name="email" required class="form-control">
        </div>
    </div>
    <div class="row col-8 mx-auto my-3">
        <div class="col-3">
             <label for="">Sujet</label>
        </div>
        <div class="col-9">
            <input type="text" name="sujet" required minlength="6" class="form-control">
        </div>
    </div>
    <div class="row col-8 mx-auto my-3">
    <label for="">Message</label> <br>
    <textarea name="message" class="form-control " id="" cols="30" rows="10"></textarea>
    </div>
    <div class="row col-8 mx-auto">
    <button class="btn btn-danger col-3 my-2 mx-auto">Envoyer</button>
    </div>
</form>
<?php 
$content=ob_get_clean();
require("view/template.php");