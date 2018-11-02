<?php 
// On inclue le fichier header.php sur la page :
require_once(__DIR__ . '/partials/header.php'); 

$title = $adress = $city = $zip = $area = $price = $type = $photo = $description = null;



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
        $errors['price'] = 'L\'adresse n\'est pas valide';
    }
    // Vérifier la ville
    if (empty($city)) {
        $errors['city'] = 'La ville n\'est pas valide';
    }
    //vérifier le copde postal
    if (!is_numeric($zip) || strlen($zip) != 5) {
        $errors['zip'] = 'Le code postal n\'est pas valide.';
    }
    // Vérifier la surface
    if (!ctype_digit($area)) { // mieux que !is_numeric
        $errors['area'] = 'La surface saisie doit être un entier.';
    }
    // vérifier le prix
    if (!ctype_digit($price)) { // mieux que !is_numeric
        $errors['price'] = 'La surface saisie doit être un entier.';
    }
    // Vérifier le type
    if (empty($type) || !in_array($type, ['location', 'vente'])) {
        $errors['type'] = 'Le type n\'est pas valide';
    }
    // description facultative, pas de contrôle

    // Vérifier la photo, s'il y en a une
    if (!empty($photo)){ // Si l'utilisateur a tenté d'ajouter une photo
        if ($photo['error'] === 4) { // 4 = "Aucun fichier n'a été téléchargé." dans le $_FILES
            $errors['image'] = 'L\'image n\'est pas valide';
        }
    }
// vérifier extension, type de fichier, poid de fichier...,
/////////////////////////////////////
/////////////////////////////////////



    // Upload de l'image
    var_dump($photo);
    $file = $photo['tmp_name']; // Emplacement du fichier temporaire
    $fileName = 'img/'.$photo['name']; // Variable pour la base de données
    $finfo = finfo_open(FILEINFO_MIME_TYPE); // Permet d'ouvrir un fichier
    $mimeType = finfo_file($finfo, $file); // Ouvre le fichier et renvoie image/jpg
    $allowedExtensions = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
    // Si l'extension n'est pas autorisée, il y a une erreur
    if (!in_array($mimeType, $allowedExtensions)) {
        $errors['image'] = 'Ce type de fichier n\'est pas autorisé';
    }
    // Vérifier la taille du fichier
    // Le 30 est défini en Ko
    if ($image['size'] / 1024 > 30) {
        $errors['image'] = 'L\image est trop lourde';
    }
    if (!isset($errors['image'])) {
        move_uploaded_file($file, __DIR__.'/assets/'.$fileName); // On déplace le fichier uploadé où on le souhaite
    }
    // }
    // S'il n'y a pas d'erreurs dans le formulaire
    if (empty($errors)) {
        $query = $db->prepare('
            INSERT INTO pizza (`name`, `price`, `image`, `category`, `description`) VALUES (:name, :price, :image, :category, :description)
        ');
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':price', $price, PDO::PARAM_STR);
        $query->bindValue(':image', $fileName, PDO::PARAM_STR);
        $query->bindValue(':category', $category, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        if ($query->execute()) { // On insère la pizza dans la BDD
            $success = true;
            // Envoyer un mail ?
            // Logger la création de la pizza
        }
    }
}

?>




    <main class="container">
        <h1>Ajouter un logement</h1>


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
                            <option <?php echo ($category === 'vente') ? 'selected' : ''; ?> value="vente">vente</option>
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