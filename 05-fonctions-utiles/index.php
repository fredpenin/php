<?php

$seconds = date('s'); // Renvoie 00, 01 ou 54

echo date('l d F Y');
echo ', il est ';
echo date('H\hi \e\t ');
echo $seconds . 'seconde';
echo ($seconds > 1) ? 's' : '';


// Quel jour il sera dans 10 jours ?

var_dump(date('d/m/Y', time()));
var_dump(date('d/m/Y', strtotime('+ 10 days')));


// Dans combien de jours est Noël ?
$currentTimestamp = time();
$targetTimestamp = strtotime('25 December 2018');

// Conversion des secondes en jours
$total = ($targetTimestamp - $currentTimestamp) / 60 / 60 / 24;
$days = round($total);
$hours = ($total - $days) * 24;
echo $days. ' jours et ';
echo $hours . ' heures';
