<?php
$letitre= htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
$ladesc= htmlspecialchars(strip_tags($_POST['ladesc']),ENT_QUOTES);
$ladate= htmlspecialchars(strip_tags($_POST['ladate']),ENT_QUOTES);
$ecrivain_id = (int) $_POST['ecrivain_id'];

// modification d'un livre
$sql = "UPDATE ecrivain_livre SET letitre = '$letitre',
        ladescription= '$ladesc',
        lasortie= '$ladate',
        ecrivain_id = $ecrivain_id
        WHERE id = $editer
          ;
";
$req_ecrivain = mysqli_query($mysqli,$sql)or die('erreur pendant edition'.mysqli_error($mysqli));

$titre = "Merci d'avoir modifié un livre";

$contenu = "<h2>Livre modifié, merci !</h2>";

?>
