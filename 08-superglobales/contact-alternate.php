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

			$errors = [];

			if (empty($email)) { // Vérifie si l'email est vide
				$errors['email'] = 'L\'email est vide. <br />';
				// array_push($errors, 'L\'email est vide. <br />');
		        //echo 'L\'email est vide. <br />';
		    }

			if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) { // Vérifie si l'email est valide
				$errors['email'] = 'L\'email n\'est pas valide. <br />';
		        //echo 'L\'email n\'est pas valide. <br />';
		    }

		    if (empty($subject)) {
		    	$errors['subject'] = 'Le sujet ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
		    }

		    if (strlen($message) < 15) {
		    	$errors['message'] = 'Le message est trop court.';
		        //echo 'Le message est trop court.';
		    }

		    if (empty($errors)) {
			    echo 'Envoi du mail';
			}
		}
	?>
	<div class="container">
		<h1>Formulaire de contact</h1>
		<form method="POST">
		    <div class="form-group">
		        <label for="email">Email</label>
		        <input
		        	class="form-control <?= (isset($errors['email'])) ? 'is-invalid' : ''; ?>"
		        	type="text" name="email" id="email" value="<?= $email; ?>" />
		        <div class="invalid-feedback">
		        	<?php echo (isset($errors['email'])) ? $errors['email']: ''; ?>
		        </div>
		    </div>
		    <div class="form-group">
		        <label for="subject">Sujet</label>
		        <input class="form-control <?= (isset($errors['subject'])) ? 'is-invalid' : ''; ?>"
		        	type="text" name="subject" id="subject" value="<?php echo $subject; ?>" />
		        <div class="invalid-feedback">
		        	<?php echo (isset($errors['subject'])) ? $errors['subject']: ''; ?>
		        </div>
		    </div>
		    <div class="form-group">
		        <label for="message">Message</label>
		        <textarea class="form-control <?= (isset($errors['message'])) ? 'is-invalid' : ''; ?>" name="message" id="message"><?php echo $message; ?></textarea>
		        <div class="invalid-feedback">
		        	<?php echo (isset($errors['message'])) ? $errors['message']: ''; ?>
		        </div>
		    </div>

		    <button class="btn btn-primary">Envoyer</button>
		</form>
	</div>
	<?php
		// var_dump(filter_var('a@a.fr', FILTER_VALIDATE_EMAIL));

	?>
</body>
</html>
