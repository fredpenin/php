<?php

$age = 17;

if ($age >= 18) {

	echo 'Vous pouvez entrer.';

} else if ($age >= 16 && $age < 18) {

	echo 'Vous êtes presque majeur';

} else if ($age >= 14 && $age < 16) {

	echo 'Vous êtes jeune';

} else {

	echo 'Vous êtes trop jeune';

}
