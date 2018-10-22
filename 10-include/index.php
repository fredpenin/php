<?php

var_dump(__DIR__); // Dossier dans lequel est situé le fichier
var_dump(__FILE__);

// include('');
include_once('a.php');
include 'a.php'; // Execute le contenu du fichier A
include('a.php'); // Affiche le contenu du fichier a 2 fois
include_once('a.php'); // Affiche le contenu du fichier a seulement s'il n'a pas encore été affiché

require __DIR__ . '/b.php'; // Si b.php n'existe pas, le reste du code ne se lance pas

echo 'RESTE DU SITE';
