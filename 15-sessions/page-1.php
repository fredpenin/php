<?php

session_start(); // On veut utiliser les sessions sur la page

var_dump($_SESSION); // Le tableau est vide la première fois

$countries = ['fr', 'it'];

// J'ajoute le pays dans la session
$_SESSION['countries'] = $countries;
unset($_SESSION['countries']); // Permet de supprimer un élément d'une session
// session_destroy(); // Attention, supprimer toute la session.

var_dump($_SESSION); // La session doit contenir tous les pays

// Pour les cookies (session qui dure indéfiniment et sur la machine cliente)
var_dump($_COOKIE);
// $_COOKIE['cookie'] = 'test';
setcookie('cookie', 'test', time()+60*60*24*365); // crée le cookie "cookie" contenant la chaine "test" et expirant dans 1 an

// Détruire un cookie
setcookie('cookie', null, time()-60*60*24*365);
