<?php
// récupération des variables POST
$letitre= htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
$ladesc= htmlspecialchars(strip_tags($_POST['ladesc']),ENT_QUOTES);
$ladate= htmlspecialchars(strip_tags($_POST['ladate']),ENT_QUOTES);

// insertion d'un livre
$sql = "INSERT INTO ecrivain_livre (letitre,ladescription,lasortie,ecrivain_id) VALUES
        ('$letitre','$ladesc','$ladate',$idecrivain)
          ;
";
$req_ecrivain = mysqli_query($mysqli,$sql)or die('erreur model enform'.mysqli_error($mysqli));

$titre = "Merci d'avoir inséré un livre";

$contenu = "<h2>Livre inséré, merci!</h2>";
?>
