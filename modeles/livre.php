<?php
// récupération des détails du livre avec son ecrivain_id
$sql = "SELECT l.letitre, l.ladescription, l.lasortie,
        e.id as idecrivain, e.lenom,
        p.laperiode
        FROM ecrivain_livre l
          INNER JOIN ecrivain_ecrivain e
            ON e.id = l.ecrivain_id
          INNER JOIN ecrivain_periode p
            ON p.id = e.siecle_id
          WHERE l.id = $idlivre
          ;
";
$req_livre = mysqli_query($mysqli,$sql)or die('erreur model livre - details livre'.mysqli_error($mysqli));

$affiche_livre = mysqli_fetch_assoc($req_livre);

// si on a pas de périodes correspondantes ( valeurs => null )
if(is_null($affiche_livre)){

    // affichage erreur
    $erreur = "Ce livre n'existe pas !";
    include "vues/erreur.php";
    // on arrête le script
    exit();
}

// récupération de l'id de l'écrivain
$idecrivain = $affiche_livre['idecrivain'];

// on récupére tous les livres du même auteur sauf l'actuel

$sql = "SELECT l.id, l.letitre
        FROM ecrivain_livre l
        WHERE l.id != $idlivre AND l.ecrivain_id = $idecrivain";

$req_livres = mysqli_query($mysqli,$sql)or die('erreur model livres - livres meme auteur'.mysqli_error($mysqli));

//$affiche_livres = mysqli_fetch_all($req_livres,MYSQLI_ASSOC);

// pour la vue
$titre = $affiche_livre['letitre'];

$contenu = "<h2>".$affiche_livre['letitre']."</h2>";

    $contenu .= "<h3>Par ".$affiche_livre['lenom']."</h3>";
    $contenu .= "<h4>".$affiche_livre['laperiode']."</h4>";
    $contenu .= "<p>".nl2br($affiche_livre['ladescription'])."</p>";
    $contenu .= "<hr><h2>Autres oeuvres du même auteur</h2>";

while($affiche =  mysqli_fetch_assoc($req_livres)) {
    $contenu.= "<h3><a href='?idlivre=".$affiche['id']."'>".$affiche['letitre']."</a></h3>";
}
?>
