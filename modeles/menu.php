<?php
$sql = "SELECT * FROM ecrivain_periode ORDER BY id ASC";
$req_periode = mysqli_query($mysqli, $sql) or die('pb menu'.mysqli_error($mysqli));
//$affiche_periode = mysqli_fetch_all($req_periode, MYSQLI_ASSOC);