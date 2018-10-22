<?php

// 1. Créer une fonction calculant le carré d'un nombre

function square($number) {
	return $number * $number;
}

echo square(5); // 25
echo '<br />';
echo square(10); // 100
echo '<br />';
echo square(7); // 49
echo '<br />';

// 2. Créer une fonction calculant l'aire d'un rectangle et une fonction pour celle d'un cercle

function rectArea($length, $width) {
	return $length * $width;
}

echo rectArea(10, 5); // 50
echo '<br />';

function circleArea($radius) {
	return square($radius) * M_PI; // M_PI ou pi()
}

echo circleArea(10); // 314.15
echo '<br />';

// 3. Créer une fonction calculant le prix TTC d'un prix HT. Nous aurons besoin de 2 paramètres, le prix HT et le taux.

function convertHtToTtc($price, $rate) {
	return $price * (1 + $rate / 100);
}

echo convertHtToTtc(10, 20); // 10 euros HT -> 12 euros TTC
echo '<br />';

// 4. Ajouter un 3ème paramètre à cette fonction permettant de l'utiliser dans les 2 sens (HT vers TTC ou TTC vers HT)

// $withTax est un argument avec une valeur par défaut
function convert($price, $rate, $withTax = true) {
	if ($withTax) {
		return $price * (1 + $rate / 100);
	}

	return $price / (1 + $rate / 100); // price without taxes
}

echo convert(10, 20); // 10 euros HT -> 12 euros TTC
echo '<br />';
echo convert(10, 20, false); // 10 euros TTC -> 8.33 euros HT
echo '<br />';




















