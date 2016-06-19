<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 1/03/2016
 * Time: 15:18
 */
// si on est déjà connecté, on ne doit pas pouvoir accéder à ce contrôleur

// si on a une variable de session et qu'elle est valide
if(isset($_SESSION['clef'])&&$_SESSION['clef']==session_id()) {
    // on arrive sur l'accueil
    header("Location: ./");
}

// on a envoyé le formulaire
if(!empty($_POST)){
    $lelogin = strip_tags(trim($_POST['lelogin']));
    $lepass = strip_tags(trim($_POST['lepass']));
    // vérification de login et password
    if($lelogin==LOGIN && $lepass == PASS){
        // création des variables de session
        $_SESSION['clef']=session_id();
        $_SESSION['lelogin'] = LOGIN;
        // redirection vers l'admin
        header("Location: ?admin");
    }
}