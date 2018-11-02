<?php 
// On inclue le fichier header.php sur la page :
require_once(__DIR__ . '/partials/header.php'); 

// Initialisation des variables
$title = $adress = $city = $zip = $area = $price = $type = $photo = $description = null;

// Si le formulaire est soumis
if (!empty($_POST)) {
    $title = $_POST['title'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $area = $_POST['area'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $photo = $_FILES['photo'];
    $description = $_POST['description'];

    // Définition d'un tableau d'erreur vide qui va se remplir après chaque erreur
    $errors = [];

    // Vérifier le titre
    if (empty($title)) {
        $errors['title'] = 'Le nom n\'est pas valide';
    }
    // Vérifier l'adresse
    if (strlen($adress) < 5) {
        $errors['adress'] = 'L\'adresse n\'est pas valide';
    }
    // Vérifier la ville
    if (empty($city)) {
        $errors['city'] = 'La ville n\'est pas valide';
    }
    //vérifier le copde postal : chiffres et 5 caractères
    if (!is_numeric($zip) || strlen($zip) != 5) {
        $errors['zip'] = 'Le code postal n\'est pas valide.';
    }
    // Vérifier la surface
    if (!ctype_digit($area)) { // mieux que !is_numeric
        $errors['area'] = 'La surface saisie doit être un entier.';
    }
    // vérifier le prix
    if (!ctype_digit($price)) {
        $errors['price'] = 'Le prix saisi doit être un entier.';
    }
    // Vérifier le type
    if (empty($type) || !in_array($type, ['location', 'vente'])) {
        $errors['type'] = 'Le type de logement n\'est pas valide';
    }
    // "description" facultative, pas de contrôle

    // Upload de l'image (si l'utilisateur a choisi d'en uploader une, car champ facultatif)
    if (!empty($photo['name'])){
        //var_dump($photo);
        $file = $photo['tmp_name']; // Emplacement du fichier temporaire
        $fileName = 'img/'.$photo['name']; // Variable pour la base de données
        $finfo = finfo_open(FILEINFO_MIME_TYPE); // Permet d'ouvrir un fichier
        $mimeType = finfo_file($finfo, $file); // Ouvre le fichier et renvoie image/jpg
        $allowedExtensions = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
        // Vérifier l'extension
        if (!in_array($mimeType, $allowedExtensions)) {
            $errors['photo'] = 'Ce type de fichier n\'est pas autorisé';
        }
        // Vérifier le poid du fichier
        if ($photo['size'] / 1024 > 3500) {
            $errors['photo'] = 'La photo ne doit pas dépasser 3,5 Mo.';
        }
        if (!isset($errors['photo'])) {
            move_uploaded_file($file, __DIR__.'/assets/'.$fileName); // On déplace le fichier uploadé où on le souhaite
        }
    }

    // S'il n'y a pas d'erreurs dans le formulaire
    if (empty($errors)) {
        $query = $db->prepare('
            INSERT INTO logement (`titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `type`, `photo`, `description`) 
            VALUES (:titre, :adresse, :ville, :cp, :surface, :prix, :type, :photo, :description)
        ');
        $query->bindValue(':titre', $title, PDO::PARAM_STR);
        $query->bindValue(':adresse', $adress, PDO::PARAM_STR);
        $query->bindValue(':ville', $city, PDO::PARAM_STR);
        $query->bindValue(':cp', $zip, PDO::PARAM_INT);
        $query->bindValue(':surface', $area, PDO::PARAM_INT);
        $query->bindValue(':prix', $price, PDO::PARAM_INT);
        $query->bindValue(':type', $type, PDO::PARAM_STR);
        $query->bindValue(':photo', $fileName, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        if ($query->execute()) { // On insère le logement dans la BDD
            $success = true;

                // Pour l'exercice 5 :
                // On récupère l'id du dernier enregistrement de la table
            //$id = $db->lastInsertId();
                // On appelle la procédure qui va renommer le fichier et en créer une copie redimenssionnée
            //renameAndCreateMini($file, $id);
        }
    }
}
?>

    <main class="container">
        <h1>Ajouter un logement</h1>

        <!-- Si l'enregistrement s'est bien passé, message de succès -->
        <?php if (isset($success) && $success) { ?>
            <div class="alert alert-success alert-dismissible fade show">
                Le logement <strong><?php echo $title; ?></strong> a bien été ajouté avec l'id <strong><?php echo $db->lastInsertId(); ?></strong> !
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        
        <!-- FORMULAIRE -->
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input type="text" name="title" id="title" class="form-control <?php echo isset($errors['title']) ? 'is-invalid' : null; ?>" value="<?php echo $title; ?>">
                        <?php if (isset($errors['title'])) {
                            echo '<div class="invalid-feedback">';
                                echo $errors['title'];
                            echo '</div>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="adress">Adresse :</label>
                        <input type="text" name="adress" id="adress" class="form-control <?php echo isset($errors['adress']) ? 'is-invalid' : null; ?>" value="<?php echo $adress; ?>">
                        <?php if (isset($errors['adress'])) {
                            echo '<div class="invalid-feedback">';
                                echo $errors['adress'];
                            echo '</div>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="city">Ville :</label>
                        <input type="text" name="city" id="city" class="form-control <?php echo isset($errors['city']) ? 'is-invalid' : null; ?>" value="<?php echo $city; ?>">
                        <?php if (isset($errors['city'])) {
                            echo '<div class="invalid-feedback">';
                                echo $errors['city'];
                            echo '</div>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="zip">Code postal :</label>
                        <input type="text" name="zip" id="zip" class="form-control <?php echo isset($errors['zip']) ? 'is-invalid' : null; ?>" value="<?php echo $zip; ?>">
                        <?php if (isset($errors['zip'])) {
                            echo '<div class="invalid-feedback">';
                                echo $errors['zip'];
                            echo '</div>';
                        } ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="area">Surface :</label>
                        <input type="text" name="area" id="area" class="form-control <?php echo isset($errors['area']) ? 'is-invalid' : null; ?>" value="<?php echo $area; ?>">
                        <?php if (isset($errors['area'])) {
                            echo '<div class="invalid-feedback">';
                                echo $errors['area'];
                            echo '</div>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" id="price" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : null; ?>" value="<?php echo $price; ?>">
                        <?php if (isset($errors['price'])) {
                            echo '<div class="invalid-feedback">';
                                echo $errors['price'];
                            echo '</div>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="type">Type :</label>
                        <select name="type" id="type" class="form-control <?php echo isset($errors['type']) ? 'is-invalid' : null; ?>">
                            <option value="">Choisir le type de logement : </option>
                            <option <?php echo ($type === 'location') ? 'selected' : ''; ?> value="location">location</option>
                            <option <?php echo ($type === 'vente') ? 'selected' : ''; ?> value="vente">vente</option>
                        </select>
                        <?php if (isset($errors['type'])) {
                            echo '<div class="invalid-feedback">';
                                echo $errors['type'];
                            echo '</div>';
                        } ?>
                    </div>

                    <div class="form-group">
                        <label for="photo">photo :</label>
                        <input type="file" name="photo" id="photo" class="form-control <?php echo isset($errors['photo']) ? 'is-invalid' : null; ?>">
                        <?php if (isset($errors['photo'])) {
                            echo '<div class="invalid-feedback">';
                                echo $errors['photo'];
                            echo '</div>';
                        } ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" rows="5" class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : null; ?>"><?php echo $description; ?></textarea>
                        <?php if (isset($errors['description'])) {
                            echo '<div class="invalid-feedback">';
                                echo $errors['description'];
                            echo '</div>';
                        } ?>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-lg btn-block btn-danger text-uppercase font-weight-bold">Enregistrer</button>
            </div>
        </form>





    </main>


    <?php 
// On inclue le fichier footer.php sur la page :
require_once(__DIR__ . '/partials/footer.php'); ?>