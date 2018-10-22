<?php

/*
1. Créer une boucle qui affiche 10 étoiles (*)
2. Imbriquer la boucle dans une autre boucle afin d'afficher 10 lignes de 10 étoiles
3. Nous obtenons un carré. Trouver un moyen de modifier le code pour obtenir
un triangle rectangle.
*/

for ($i = 10; $i > 0; $i--) {
    for ($j = 10; $j > 0; $j--) {
        echo '⭐';
    }

    echo '<br />';
}

echo '-------------- <br /><br />';

/*
☆☆☆☆☆★☆☆☆☆☆
☆☆☆☆★★★☆☆☆☆
☆☆☆★★★★★☆☆☆
☆☆★★★★★★★☆☆
☆★★★★★★★★★☆
★★★★★★★★★★★
*/
$fullStar = 1; // Nombre d'étoiles pleines
$indexStar = 5; // Position

for ($x = 0; $x < 6; $x++) {
    for ($y = 0; $y < 11; $y++) {
        if ($y == $indexStar) {
            for ($z = 0; $z < $fullStar; $z++) {
                echo '★';
            }
            $y += $fullStar - 1;
        } else {
            echo '☆';
        }
    }
    $indexStar--;
    $fullStar += 2;
    echo '<br />';
}

/**
 * Afficher les tables de multiplication de 0 à 10
 */
echo '-------------- <br /><br />';

echo '<table align="center" border="1" style="border-collapse: collapse">';
// Légende du tableau (1ére ligne)
echo '<tr> <td align="center" style="width: 20px; background-color: grey">x</td>';
for ($z = 0; $z <= 10; $z++) {
    $color = ($z % 2) ? 'grey' : 'lightgrey';
    echo '<td align="center" style="width: 20px; background-color: '.$color.'">'.$z.'</td>';
}
echo '</tr>';

for ($y = 0; $y <= 10; $y++) {
    $color = ($y % 2) ? 'grey' : 'lightgrey';
    $r = ($color === 'grey') ? 1 : 0;
    echo '<tr> <td align="center" style="width: 20px; background-color: '.$color.'">'.$y.'</td>';
    for ($x = 0; $x <= 10; $x++) {
        $color = ($x % 2 === $r) ? 'grey' : 'lightgrey';
        echo '<td align="center" style="width: 20px; background-color: '.$color.'"">'.$x * $y.'</td>';
    }
    echo '</tr>';
}
echo '</table>';
