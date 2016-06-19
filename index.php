<?php
/**
 * Created by PhpStorm.
 * Contrôleur frontal
 */

// ouverture de session
session_start();

// configuration
require_once "config.php";

// connexion à la db
require_once "modeles/db.php";

// routeur qui est un contrôleur secondaire
require_once "controleurs/routeur.php";