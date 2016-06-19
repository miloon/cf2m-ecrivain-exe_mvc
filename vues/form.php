<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <title>Insérez un livre</title>
</head>
<body>
<?php require_once "controleurs/menu.php" ?>
<header></header>
<section><h1>Insérez un livre</h1>

<div id="contenu">
<h3><a href="?admin">Ajouter un livre</a> -
    <a href="?admin&modif">Modifier ou supprimer un livre</a>
</h3>
    <form action="" name="lll" method="POST">
        <input type="text" name="letitre" placeholder="Votre titre" required/><br/>
        <textarea name="ladesc" placeholder="Votre texte" required/></textarea><br/>
        <input name="ladate" type="number" min="1400" max="2000" required/><br/>
        <select name="ecrivain_id" required>
            <option value="">Choix de l'auteur</option>
        <?php
        while($affiche =  mysqli_fetch_assoc($req_ecrivain)) {
            echo "<option value='".$affiche['id']."'>".$affiche['lenom']."</option>";
        }

        ?>
        </select><br/><input type="submit" value="Envoyer"/>
    </form>

</div>
</section>
</body>
</html>