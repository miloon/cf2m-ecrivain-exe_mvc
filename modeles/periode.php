<?php
// récupération du titre de la période actuelle (au cas où il n'y a pas d'écrivain)
$sql = "SELECT *
          FROM ecrivain_periode
          WHERE id = $idperiode
          ;
";
$req_periode = mysqli_query($mysqli,$sql)or die('erreur model periode'.mysqli_error($mysqli));

$affiche_periode = mysqli_fetch_assoc($req_periode);

// si on a pas de période correspondante (donc 0 résultat = false)
if(!mysqli_num_rows($req_periode)){

    // affichage erreur
    $erreur = "Cette période n'existe pas !";
    include "vues/erreur.php";
    // on arrête le script
    exit();
}

// récupération des écrivains
$sql = "SELECT id, lenom, SUBSTRING(labio,1,250) as labio
        FROM ecrivain_ecrivain WHERE siecle_id = $idperiode;";

$req_ecrivain = mysqli_query($mysqli,$sql)or die('erreur model periode - ecrivains'.mysqli_error($mysqli));

//$affiche_ecrivain = mysqli_fetch_all($req_ecrivain,MYSQLI_ASSOC);

// si on n'a pas d'écrivain (la variable Array est vide)
if(empty($req_ecrivain)){

    // affichage erreur
    $erreur = "Pas d'écrivain !";
    include "vues/erreur.php";
    // on arrête le script
    exit();
}

$titre = $affiche_periode['laperiode'];

$contenu = "<h2>Ecrivains du $titre siècle</h2>";

while($affiche =  mysqli_fetch_assoc($req_ecrivain)) {
    $contenu .= "<h3>".$affiche['lenom']."</h3>";
    $contenu .= "<p>".$affiche['labio']."... <a href='?idecrivain=".$affiche['id']."'>Lire la suite</a></p><hr/>";
}

?>
