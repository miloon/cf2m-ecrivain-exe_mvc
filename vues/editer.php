<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <title>Modifier ce livre</title>
</head>
<body>
<?php require_once "controleurs/menu.php" ?>
<header></header>
<section><h1>Modifier ce livre</h1>

<div id="contenu">
<h3><a href="?admin">Ajouter un livre</a> -
    <a href="?admin&modif">Modifier ou supprimer un livre</a>
</h3>
    <form action="" name="lll" method="POST">
        <input type="text" name="letitre" value="<?=$affiche_livre['letitre']?>" required/><br/>
        <textarea name="ladesc"  required/><?= $affiche_livre['ladescription'] ?></textarea><br/>
        <input name="ladate" type="number" min="1400" max="2000" value="<?= $affiche_livre['lasortie'] ?>" required/><br/>
        <select name="ecrivain_id" required>
        <?php

        // variable vide qui n'affichera donc rien tant qu'elle le reste
        $choix_ecrivain = "";
        while($affiche =  mysqli_fetch_assoc($req_ecrivain)) {
            // si l'id de l'écrivain correspond à celui qui a écrit le livre
            if($affiche['id']== $affiche_livre['idecrivain']){
                // on remplit la variable pour sélectionner le champs souhaité
                $choix_ecrivain = "selected";
            }
            // affichage de la variable contenant selected ou du vide
            echo "<option value='".$affiche['id']."' $choix_ecrivain >".$affiche['lenom']."</option>";
            // si la variable a été remplie, on la vide (1 choix possible)
            $choix_ecrivain = "";
        }

        ?>
        </select><br/><input type="submit" value="Modifier"/>
    </form>

</div>
</section>
</body>
</html>