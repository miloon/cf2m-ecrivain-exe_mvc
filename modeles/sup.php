<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 29/02/2016
 * Time: 12:06
 */

$sql = "DELETE FROM ecrivain_livre WHERE id= $sup ";

mysqli_query($mysqli,$sql)or die('erreur model suppression livre'.mysqli_error($mysqli));

header("Location: ?admin&modif");