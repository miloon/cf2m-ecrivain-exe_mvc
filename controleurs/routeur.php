<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Notre routeur
 */

// si pas de variables get
if(empty($_GET)){

    // on appelle le modèle qui va récupérer les informations dans la db
    require_once "modeles/accueil.php";
    // on récupère sa vue (ici un layer pour accueil, période, écrivains, livres
    include "vues/layer.php";

}elseif(isset($_GET['idperiode'])&& ctype_digit($_GET['idperiode'])){
    $idperiode = (int) $_GET['idperiode'];
    // on appelle le modèle qui va récupérer les informations dans la db
    require_once "modeles/periode.php";
    // on récupère sa vue (ici un layer pour accueil, période, écrivains, livres
    include "vues/layer.php";

}elseif(isset($_GET['idecrivain'])&& ctype_digit($_GET['idecrivain'])){
    $idecrivain = (int) $_GET['idecrivain'];
    // on appelle le modèle qui va récupérer les informations dans la db
    require_once "modeles/ecrivain.php";
    // on récupère sa vue (ici un layer pour accueil, période, écrivains, livres
    include "vues/layer.php";

}elseif(isset($_GET['idlivre'])&& ctype_digit($_GET['idlivre'])) {
    $idlivre = (int)$_GET['idlivre'];
    // on appelle le modèle qui va récupérer les informations dans la db
    require_once "modeles/livre.php";
    // on récupère sa vue (ici un layer pour accueil, période, écrivains, livres
    include "vues/layer.php";

    // on veut se connecter
}elseif(isset($_GET['connect'])){

        // On va chercher le contrôleur pour se connecter
        require_once "controleurs/connect.php";

        // on récupère le formulaire de connexion
        include "vues/connect.php";

    // on veut se déconnecter
}elseif(isset($_GET['deco'])){

    // On va chercher le modèle pour se déconnecter
    require_once "modeles/deco.php";


}elseif(isset($_GET['admin'])){

    // On va chercher le contrôleur pour l'admin
    require_once "controleurs/admin.php";


}else{
    // on appelle le modèle qui va récupérer les informations dans la db
    require_once "modeles/accueil.php";
    // on récupère sa vue (ici un layer pour accueil, période, écrivains, livres
    include "vues/layer.php";
}