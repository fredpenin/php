<form method="POST">
    <div>
        <label for="nombre1">Nombre 1</label>
        <input type="text" name="nombre1" id="nombre1"
        	placeholder="Saisir un nombre"
        	value="<?php echo !empty($_POST) ? $_POST['nombre1'] : ''; ?>"
        />
    </div><br />
    <div>
        <label for="nombre2">Nombre 2</label>
        <input type="text" name="nombre2" id="nombre2"
        	placeholder="Saisir un nombre"
        	value="<?php echo !empty($_POST) ? $_POST['nombre2'] : ''; ?>"
        />
    </div><br />
    <div>
        <label for="addition">+</label>
        <input type="radio" name="operateur" id="addition" value="+"
        	<?php echo (isset($_POST['operateur']) && '+' === $_POST['operateur']) ? 'checked' : ''; ?>
        />
        <label for="substraction">-</label>
        <input type="radio" name="operateur" id="substraction" value="-"
        	<?php echo (isset($_POST['operateur']) && '-' === $_POST['operateur']) ? 'checked' : ''; ?>
        />
        <label for="division">/</label>
        <input type="radio" name="operateur" id="division" value="/"
        	<?php echo (isset($_POST['operateur']) && '/' === $_POST['operateur']) ? 'checked' : ''; ?>
        />
        <label for="multiplication">x</label>
        <input type="radio" name="operateur" id="multiplication" value="*"
        	<?php echo (isset($_POST['operateur']) && '*' === $_POST['operateur']) ? 'checked' : ''; ?>
        />
    </div><br />

    <button>Calculer</button>
</form>

<?php

if (!empty($_POST)) { // Savoir si le formulaire a été soumis
	$nombre1 = $_POST['nombre1'];
	$nombre2 = $_POST['nombre2'];
	$operateur = isset($_POST['operateur']) ? $_POST['operateur'] : '+';
	$resultat = 0;

	if (!is_numeric($nombre1) || !is_numeric($nombre2)) {
		echo 'Les nombres saisis ne sont pas valides';
		exit(); // Arrête le script PHP
	}

	 // Si le nombre2 est égal à zéro, on ne peut pas faire le calcul
    if ($nombre2 == 0 && $operateur == '/') {
        echo 'Attention, division par zéro.';
        exit();
    }

	switch ($operateur) {
		case '+':
            $resultat = $nombre1 + $nombre2;
        break;

        case '-':
            $resultat = $nombre1 - $nombre2;
        break;

        case '/':
            $resultat = $nombre1 / $nombre2;
        break;

        case '*':
            $resultat = $nombre1 * $nombre2;
        break;
	}

	echo $resultat;
}



















