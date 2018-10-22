<?php


$number1 = 0;
$number2 = 5;
$number3 = 8;

$resultat1 = $number1 + $number2 + $number3;
$resultat2 = $number1 * ($number2 - $number3);
$resultat3 = 'Division par 0 impossible';

// Si le nombre 1 est différent de 0, on peut faire le calcul
if ($number1 !== 0) {
	$resultat3 = ($number3 - $number2) / $number1;
}

echo $number1 . ' + ' . $number2 . ' + ' . $number3 . ' = '. $resultat1 .' <br />';
echo "$number1 x ($number2 - $number3) = $resultat2 <br />";
echo "($number3 - $number2) / $number1 = $resultat3";

if ($resultat1 < 20 || $resultat2 < 20 || $resultat3 < 20) {
	echo 'Une des opérations renvoie moins de 20';
}
