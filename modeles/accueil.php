<?php
// récupération de 3 écrivains au hasard
$sql = "SELECT e.id as ecrivain_id, e.lenom, SUBSTRING(e.labio,1,200) as labio, p.id as periode_id, p.laperiode
          FROM ecrivain_ecrivain e, ecrivain_periode p
          WHERE e.siecle_id = p.id
          ORDER BY RAND() LIMIT 3;
";
$req_ecrivains = mysqli_query($mysqli,$sql)or die('erreur model accueil'.mysqli_error($mysqli));
$titre = "Les auteurs du 16ème au 20ème siècle";
//$affiche_ecrivains = mysqli_fetch_all($req_ecrivains,MYSQLI_ASSOC);

$contenu = "<h2>3 écrivains au hasard</h2>";
while($affiche =  mysqli_fetch_assoc($req_ecrivains)) {
    $contenu .= "<h3>".$affiche['lenom']."</h3>";
    $contenu .= "<h4>Période : <a href='?idperiode=".$affiche['periode_id']."'>".$affiche['laperiode']."</a></h4>";
    $contenu .= "<p>".$affiche['labio']."... <a href='?idecrivain=".$affiche['ecrivain_id']."'>Lire la suite</a></p><hr/>";
}
?>
