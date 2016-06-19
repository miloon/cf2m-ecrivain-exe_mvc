<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <title>Modifier ou supprimer un livre</title>
    <script src="vues/js/monjs.js"></script>
</head>
<body>
<?php require_once "controleurs/menu.php" ?>
<header></header>
<section><h1>Modifier ou supprimer un livre</h1>

<div id="contenu">
    <h3><a href="?admin">Ajouter un livre</a> -
        <a href="?admin&modif">Modifier ou supprimer un livre</a>
    </h3>
    <?php
    while($affiche =  mysqli_fetch_assoc($req_livre)) {
        echo "<h4>".$affiche['letitre']." (".$affiche['lasortie'].") par ".$affiche['lenom']."</h4>";
        echo "<p>".$affiche['ladesc']."</p>";
        echo "<p><a href='?admin&editer=".$affiche['id']."'><img src='vues/img/editer.gif' alt='Editer'/></a>";
        ?>
        <img src='vues/img/delete.gif' alt='Supprimer' onclick='confirmDelete("<?=$affiche['letitre']?>",<?=$affiche['id']?>)'/></p><hr/>
    <?php
    }
    ?>
</div></section>
</body>
</html>