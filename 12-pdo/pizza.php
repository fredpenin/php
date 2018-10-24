<?php
// On crée une connexion à la BDD
//$db = new PDO('mysql:host=localhost;dbname=pizzastore', 'root', '');

// Le try catch permet de faire quelque chose de particulier s'il y a une erreur
try {
	$db = new PDO('mysql:host=localhost;dbname=pizzastore;charset=utf8', 'root', '', [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Active les erreurs SQL,
		// On récupère tous les résultats en tableau associatif
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	]);
} catch(Exception $e) {
	echo $e->getMessage();
	// Redirection en PHP vers Google avec le message d'erreur concerné
	header('Location: https://www.google.fr/search?q='.$e->getMessage());
}

///////////////////////////////////////////////////////////////
// 1. Ecrire la requête permettant de récup la pizza avec l'id 3
$query = $db->query('SELECT * FROM pizza WHERE id = 3');

$pizza = $query->fetch();
echo $pizza['id'] . " : " . $pizza['name'];

// while ($pizza = $query->fetch()) {
//     if ($pizza['id'] == '3'){
//         echo $pizza['name'];
//     }
// }
// ou :

// $pizz = $query->fetchAll()[2];
// echo $pizz['name'];


// 2. Récupérer l'id dynamiquement à partir de l'URL
// Exemple : Si je saisis pizza.php?id=7, je dois récupérer la pizza avec l'id 7
var_dump($_GET);
$id = isset($_GET['id']) ? $_GET['id'] : 0;
//if (is_numeric($id)) {
	echo 'SELECT * FROM pizza WHERE id = "'.$id.'"; <br />';
	$query = $db->query('SELECT * FROM pizza WHERE id = '.$id);
	$pizza = $query->fetch();
	var_dump($pizza);
	// On vérifie que la pizza existe
	if ($pizza) {
		echo $pizza['id'] . ' : ' .$pizza['name'];
	} else {
		echo 'La pizza n\'existe pas';
	}
//} else {
//	echo 'La pizza n\'existe pas';
//}
// Exemple requête préparée
$query = $db->prepare('SELECT * FROM pizza WHERE id = :id');
$query->bindValue(':id', $id, PDO::PARAM_STR);
var_dump($query);


