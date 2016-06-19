<?php
// récupération de tous les écrivains pour l'update
$sql = "SELECT id, lenom FROM ecrivain_ecrivain ORDER BY lenom ASC
          ;
";
$req_ecrivain = mysqli_query($mysqli,$sql)or die('erreur model editer ecrivain'.mysqli_error($mysqli));

//$affiche_ecrivain = mysqli_fetch_all($req_ecrivain,MYSQLI_ASSOC);

// récupération des détails du livre avec son ecrivain_id
$sql = "SELECT l.id, l.letitre, l.ladescription, l.lasortie,
        e.id AS idecrivain, e.lenom
        FROM ecrivain_livre l
          INNER JOIN ecrivain_ecrivain e
            ON e.id = l.ecrivain_id
        WHERE l.id = $editer
          ;
";
$req_livre = mysqli_query($mysqli,$sql)or die('erreur model editer livre'.mysqli_error($mysqli));
$affiche_livre = mysqli_fetch_assoc($req_livre);
?>
