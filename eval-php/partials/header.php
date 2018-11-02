<?php
// On inclue le fichier database.php sur la page :
require_once(__DIR__ . '/../config/database.php'); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Recherche de logement en France">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">


    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- My Style -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Immobilier</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logement_add.php">Ajouter un logement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logement_show.php">Afficher les logements</a>
                </li>
            </ul>
        </div>
    </nav>