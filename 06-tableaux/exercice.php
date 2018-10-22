<?php

$eleves = [
    0 => [
        'nom' => 'Toto',
        'notes' => [10, 8, 6, 2, 1, 1, 15, 2]
    ],
    1 => [
        'nom' => 'Thomas',
        'notes' => [4, 18, 20, 15, 13, 7]
    ],
    2 => [
        'nom' => 'Jean',
        'notes' => [17, 14, 6, 2, 16, 10, 9]
    ],
    3 => [
        'nom' => 'Enzo',
        'notes' => [1, 14, 19, 2, 1, 8, 19]
    ]
];

// echo $eleves[2]['nom']; // Affiche "Jean"
// echo $eleves[2]['notes'][2]; // Récupère la 3ème note de Jean (6)
// echo '<br /><br />';

echo '<h2>1/ Afficher la liste de tous les éléves avec leurs notes.</h2>';
foreach ($eleves as $eleve) {
    echo $eleve['nom'] . ' a eu ';

    // Nombre de notes
    $notesCount = count($eleve['notes']);
    // Parcourir toutes les notes de l'éléve
    foreach ($eleve['notes'] as $key => $note) {
        echo $note;
        // Si la note est la dernière
        if ($key === $notesCount - 1) {
            echo '.';
            // Si la note est l'avant dernière
        } else if ($key === $notesCount - 2) {
            echo ' et ';
            // Sinon
        } else {
            echo ', ';
        }
    }

    echo '<br />';
}

echo '<h2>2/ Calculer la moyenne de Jean. On part de $eleves[2][\'notes\']</h2>';
/* La fonction count permet de compter les éléments d'un tableau */
$jeanNotes = $eleves[2]['notes']; // [5, 8, 9, 10]

$sum = 0;
// Nombre de notes
$notesCount = count($jeanNotes);

// Faire la somme des notes
foreach ($jeanNotes as $note) {
    $sum += $note;
}

// Moyenne
echo round($sum / $notesCount, 2) . '<br />'; // Arrondi à 2 décimales
// echo array_sum($jeanNotes) / $notesCount . '<br />';


echo '<h2>3/ Combien d\'élèves ont la moyenne ?</h2>';
/* Exemple :
Matthieu a la moyenne
Jean n'a pas la moyenne
Thomas a la moyenne
Nombre d'éléves avec la moyenne : 2 */
$countAverage = 0;
foreach ($eleves as $eleve) {
    $average = array_sum($eleve['notes']) / count($eleve['notes']);
    echo $eleve['nom'];

    if ($average >= 10) {
        echo ' a la moyenne <br />';
        // Permet de compter le nombre d'élèves qui ont la moyenne
        $countAverage++;
    } else {
        echo ' n\'a pas la moyenne <br />';
    }
}
echo 'Nombre d\'éléves avec la moyenne : '.$countAverage;

echo '<h2>4/ Quel(s) éléve(s) a(ont) la meilleure note ?</h2>';
/* Exemple: Thomas a la meilleure note : 19 */

$bestNote = 0;

foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        if ($note > $bestNote) {
            $bestNote = $note;
        }
    }
}

// var_dump($bestNote);
foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        if ($note === $bestNote) {
            echo $eleve['nom'] . ' a la meilleure note : ' . $bestNote . '<br />';
            break; // Arrête les itérations sur la boucle
        }
    }
}

echo '<h2>5/ Qui a eu au moins un 20 ?</h2>';
/* Exemple: Personne n'a eu 20
         Quelqu'un a eu 20 */
$isTwenty = false;

foreach ($eleves as $eleve) {
    if ($eleve['nom'] === 'Thomas') {
        continue; // On passe à l'élève suivant si c'est Thomas
    }

    foreach ($eleve['notes'] as $note) {
        if (20 === $note) {
            $isTwenty = true;
            break 2;
            var_dump('ici');
        }
    }
    // break;
    var_dump('là');
}

if ($isTwenty) {
    echo 'Quelqu\'un a eu 20';
} else {
    echo 'Personne n\'a eu 20';
}

/* 6/ BONUS Tri à bulles
$notes = [4, 25, 1, 36, 24]; => [1, 4, 24, 25, 36];
*/

















