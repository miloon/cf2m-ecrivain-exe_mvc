<nav><ul>
    <li><a href="./">Accueil</a></li>
    <?php
    while($affiche =  mysqli_fetch_assoc($req_periode)) {
        ?>
        <li><a href="?idperiode=<?=$affiche['id']?>"><?=$affiche['laperiode']?>ème siècle</a></li>
        <?php

    }
    // si on a une variable de session et qu'elle est valide
    if(isset($_SESSION['clef'])&&$_SESSION['clef']==session_id()) {
        ?>
        <li><a href="?admin">Admin</a></li>
        <li><a href="?deco">Log out</a></li>
        <?php
    }else{
       echo '<li><a href="?connect">Connexion</a></li>';
    }
    if(isset($_SESSION['lelogin'])) echo "<li>Ciao ".$_SESSION['lelogin']."!</li>";
    ?>

</ul></nav>