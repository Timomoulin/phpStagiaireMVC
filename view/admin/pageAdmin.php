<?php
$title="Page Admin";
ob_start();
?>
<h1>Page admin</h1>
<p>Ceci est une page admin</p>

<?php $content=ob_get_clean();
require("view/template.php");
?>
