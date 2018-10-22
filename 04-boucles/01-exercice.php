<?php

/*
1. Ecrire une boucle qui affiche les nombres de 10 à 1
2. Ecrire une boucle qui affiche uniquement les nombres pairs entre 1 et 100
3. Ecrire le code permettant de trouver le PGCD de 2 nombres
4. Coder le jeu du FizzBuzz
    Parcourir les nombres de 0 à 100
    Quand le nombre est un multiple de 3, afficher Fizz.
    Quand le nombre est un multiple de 5, afficher Buzz.
    Quand le nombre est un multiple de 15, afficher FizzBuzz.
    Sinon, afficher le nombre
*/
echo '<h2>1. Ecrire une boucle qui affiche les nombres de 10 à 1</h2>';
for ($i = 10; $i > 0; $i--) {
	echo $i . ' - ';
}

echo '<h2>2. Ecrire une boucle qui affiche uniquement les nombres pairs entre 1 et 100</h2>';
for ($i = 2; $i <= 100; $i++) {
	if (0 === $i % 2) { // Yoda condition
		echo $i . ' - ';
	}
}

echo '3. Ecrire le code permettant de trouver le PGCD de 2 nombres';
// 845 % 312 = 221;
// 312 % 221 = 91;
// 221 % 91 = 39;
// 91 % 39 = 13;
// 39 % 13 = 0;

echo gmp_gcd(845, 312);

$nombre1 = 845;
$nombre2 = 312;

do {
	// Calculer le reste de la division du plus grand nombre par le plus petit
	$reste = $nombre1 % $nombre2;

	// Si le reste est à 0, le pgcd est le nombre 2
	if ($reste == 0) {
		$pgcd = $nombre2;
	}

	$nombre1 = $nombre2; // 845 devient 312
	$nombre2 = $reste; // 312 devient 221
} while ($reste !== 0);

echo $pgcd;



echo '<h2>4. Le jeu du FizzBuzz</h2>';

for ($i = 0; $i <= 100; $i++) {
	if ($i % 15 == 0) {
		echo 'FizzBuzz, ';
	} else if ($i % 3 == 0) {
		echo 'Fizz, ';
	} else if ($i % 5 == 0) {
		echo 'Buzz, ';
	} else {
		echo $i . ', ';
	}
}















