<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de contact</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<?php 
		// On déclare les variables pour éviter les erreurs
		$email = null;
		$subject = null;
		$message = null;
		if (!empty($_POST)) { // Récupére les informations saisies dans le formulaire
		    $email = $_POST['email'];
		    $subject = $_POST['subject'];
		    $message = $_POST['message'];
		}
	?>
	<div class="container">
		<h1>Formulaire de contact</h1>
		<form method="POST">
		    <div class="form-group">
		        <label for="email">Email</label>
		        <input class="form-control" type="text" name="email" id="email"
		        	value="<?= $email; ?>" />
		    </div>
		    <div class="form-group">
		        <label for="subject">Sujet</label>
		        <input class="form-control" type="text" name="subject" id="subject"
		        	value="<?php echo $subject; ?>" />
		    </div>
		    <div class="form-group">
		        <label for="message">Message</label>
		        <textarea class="form-control" name="message" id="message"><?php echo $message; ?></textarea>
		    </div>

		    <button class="btn btn-primary">Envoyer</button>
		</form>
	</div>
	<?php
		// var_dump(filter_var('a@a.fr', FILTER_VALIDATE_EMAIL));

		if (!empty($_POST)) { // Si le formulaire est soumis
			$isValid = true;

			if (empty($email)) { // Vérifie si l'email est vide
				$isValid = false;
		        echo 'L\'email est vide. <br />';
		    }

			if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) { // Vérifie si l'email est valide
				$isValid = false;
		        echo 'L\'email n\'est pas valide. <br />';
		    }

		    if (empty($subject)) {
		    	$isValid = false;
		        echo 'Le sujet ne doit pas être vide. <br />';
		    }

		    if (strlen($message) < 15) {
		    	$isValid = false;
		        echo 'Le message est trop court.';
		    }

		    if ($isValid) {
			    echo 'Envoi du mail';
			}

		}
	?>
</body>
</html>
