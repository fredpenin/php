<?php

/*
Acronyme : Créer une fonction qui prend en argument une chaine (World of Warcraft) et qui retourne les initiales de chaque mot en majuscule (WOW).
*/

function acronym($sentence) {
	$words = explode(' ', $sentence);
	$acronym = '';

	foreach ($words as $word) {
		// Première lettre du mot
		$firstLetter = substr($word, 0, 1);
		// $firstLetter = $word[0];
		$acronym .= $firstLetter;
	}

	return strtoupper($acronym);
}

$toto = 'World Of Warcraft';
echo acronym($toto).'<br />'; // WOW
echo acronym('PHP: Hypertext Preprocessor').'<br />'; // PHP
echo acronym('Hyper Text Markup Language').'<br />'; // HTML
echo acronym('Cascading Style Sheet').'<br />'; // CSS

/*
Conjugaison : Créer une fonction qui permet de conjuguer un verbe (chercher par exemple). Cela doit renvoyer toutes les conjugaisons au présent.
*/

function conjugate($verb) {
	$root = substr($verb, 0, -2); // Racine
	// $ending = substr($verb, -2); // Terminaison infinitif
	$vowels = ['a', 'e', 'i', 'o', 'u', 'y'];
	$subjects = [
        'Je' => 'e',
        'J\'' => 'e',
        'Tu' => 'es',
        'Il / Elle / On' => 'e',
        'Nous' => 'ons',
        'Vous' => 'ez',
        'Ils / Elles' => 'ent'
    ];

    // j' exception
    if (in_array(substr($verb, 0, 1), $vowels)) {
    	unset($subjects['Je']);
    	// Ajouter j' en premier dans le tableau
    	// $subjects = array_merge(['J\'' => 'e'], $subjects);
    } else {
    	unset($subjects['J\'']);
    }
    // *g exception (changer, manger, plonger)
    if (substr($root, -1) === 'g') {
    	$subjects['Nous'] = 'eons';
    }

    $output = '';
    foreach ($subjects as $subject => $ending) {
    	$output .= $subject . ' ' . $root . $ending . '<br />';
    }

    return $output;
}

echo conjugate('chercher');
echo conjugate('ajouter');
echo conjugate('développer');
echo conjugate('manger');














