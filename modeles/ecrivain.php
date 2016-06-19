<?php
// récupération des détails de l'écrivain
$sql = "SELECT e.lenom, e.labio,
            p.id as idperiode, p.laperiode,
            GROUP_CONCAT(l.id ORDER BY l.lasortie ASC) as idlivre, GROUP_CONCAT(l.letitre ORDER BY l.lasortie ASC SEPARATOR '|||' ) as letitre,
            GROUP_CONCAT(SUBSTRING(l.ladescription,1,100) ORDER BY l.lasortie ASC SEPARATOR '|||') as ladesc,
            GROUP_CONCAT(l.lasortie ORDER BY l.lasortie ASC SEPARATOR '|||') as lasortie
          FROM  ecrivain_ecrivain e
            INNER JOIN ecrivain_periode p
              ON e.siecle_id = p.id
            LEFT JOIN ecrivain_livre l
              ON l.ecrivain_id = e.id
          WHERE e.id = $idecrivain
          ;
";
$req_ecrivain = mysqli_query($mysqli,$sql)or die('erreur model ecrivain'.mysqli_error($mysqli));

$affiche_ecrivain = mysqli_fetch_assoc($req_ecrivain);

// si on n'a pas de période correspondante (valeur => null)
if(is_null($affiche_ecrivain['lenom'])){

    // affichage erreur
    $erreur = "Cet écrivain n'existe pas !";
    include "vues/erreur.php";
    // on arrête le script
    exit();
}

$titre = $affiche_ecrivain['lenom'];

$contenu = "<h2>".$affiche_ecrivain['lenom']."</h2>";

    $contenu .= "<h3><a href='?idperiode=".$affiche_ecrivain['idperiode']."'>".$affiche_ecrivain['laperiode']."ème siècle</a></h3>";
    $contenu .= "<p>".nl2br($affiche_ecrivain['labio'])."</p>";
    $contenu .= "<hr><h2>Oeuvres</h2>";

    $idlivre = explode(',',$affiche_ecrivain['idlivre']);
    $letitre = explode('|||',$affiche_ecrivain['letitre']);
    $ladesc = explode('|||',$affiche_ecrivain['ladesc']);
    $lasortie = explode('|||',$affiche_ecrivain['lasortie']);

foreach($idlivre as $clef => $valeur){
    $contenu .= "<h4><a href='?idlivre=$valeur'>$letitre[$clef]</a></h4>";
    $contenu .= "<h5>$lasortie[$clef]</h5>";
    $contenu .= "<p>$ladesc[$clef]... <a href='?idlivre=$valeur'>Lire la suite</a></p>";
}


?>
