<?php
$mysqli = @mysqli_connect(DB_HOST,DB_LOGIN,DB_PWD,DB_NAME);
if(mysqli_connect_error($mysqli)){
    $erreur = "Erreur numéro ".mysqli_connect_errno($mysqli);
    include "vues/erreur.php";
    // on arrête le script
    exit();
}
mysqli_set_charset($mysqli,DB_CHARSET);