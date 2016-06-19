<?php
// si on est pas connecté ou qu'elle n'est plus valide
if(!isset($_SESSION['clef']) || $_SESSION['clef']!=session_id()) {
    header("Location: ?deco");
}
// si on veut modifier ou supprimer un livre existant (clic sur modifier ou supprimer un livre)
if(isset($_GET['modif'])){
    require_once "modeles/modif.php";
    require_once "vues/modif.php";
}
// si on souhaite supprimer le livre
elseif(isset($_GET['sup'])&&ctype_digit($_GET['sup'])){
    $sup = (int) $_GET['sup'];
    // modèle
    require_once "modeles/sup.php";
}
// si on souhaite modifier le livre
elseif(isset($_GET['editer'])&&ctype_digit($_GET['editer'])&& empty($_POST)){
    $editer = (int) $_GET['editer'];
    require_once "modeles/editer.php";
    include "vues/editer.php";
}
// si on a cliqué sur le bouton "Modifier" le livre
elseif(isset($_GET['editer'])&&ctype_digit($_GET['editer'])){
    $editer = (int) $_GET['editer'];
    require_once "modeles/editerok.php";
    include "vues/layer.php";
}
// sinon si on vient d'arriver sur la page
elseif(empty($_POST)){
    require_once "modeles/form.php";
    include "vues/form.php";
// on veut insérer un livre
}elseif(isset($_POST['ecrivain_id'])&&ctype_digit($_POST['ecrivain_id'])){
    $idecrivain = (int) $_POST['ecrivain_id'];
    require_once "modeles/enform.php";
    include "vues/layer.php";
}

