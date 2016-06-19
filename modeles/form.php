<?php
// récupération de tous les écrivains
$sql = "SELECT id, lenom FROM ecrivain_ecrivain ORDER BY lenom ASC
          ;
";
$req_ecrivain = mysqli_query($mysqli,$sql)or die('erreur model form'.mysqli_error($mysqli));

//$affiche_ecrivain = mysqli_fetch_all($req_ecrivain,MYSQLI_ASSOC);

?>
