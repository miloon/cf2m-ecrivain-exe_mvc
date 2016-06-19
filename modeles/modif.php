<?php
// récupération des détails du livre avec son ecrivain_id
$sql = "SELECT l.id, l.letitre, SUBSTRING(l.ladescription,1,200) as ladesc, l.lasortie,
        e.lenom
        FROM ecrivain_livre l
          INNER JOIN ecrivain_ecrivain e
            ON e.id = l.ecrivain_id
          ORDER BY l.id DESC
          ;
";
$req_livre = mysqli_query($mysqli,$sql)or die('erreur model modif'.mysqli_error($mysqli));

//$affiche_livre = mysqli_fetch_all($req_livre,MYSQLI_ASSOC);
