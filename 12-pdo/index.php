<?php
$db = new PDO('mysql:host=localhost; dbname=pizzastore', 'root', '');

var_dump($db);

$query = $db->query("SELECT * FROM pizza");
// var_dump($query);



// $pizzas = $query->fetchAll();
// var_dump($pizzas);
// // parcourir les pizzas avec fetchall : 
// //echo count($pizzas); // renvoie 7
// for ($i=0; $i< count($pizzas); $i++){
//     echo "<h1>" . $pizzas[$i][1] . "</h1> <br />";
// }

// parcourir les pizzas avec fetch : 

// var_dump($pizza);
while ($pizza = $query->fetch()){
    echo "<h1>" . $pizza['name'] . "</h1> <br />";
}







