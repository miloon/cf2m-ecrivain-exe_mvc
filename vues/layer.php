<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <title><?=$titre?></title>
</head>
<body>
<?php require_once "controleurs/menu.php" ?>
<header></header>
<section><h1><?=$titre?></h1>

<article><div id="contenu"><?=$contenu?></div></article>
</section>
</body>
</html>