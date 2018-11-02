<?php 
// On inclue la base de donnée pour pouvoir paramétert le $CurrentPageTitle avant l'appel du header :
require_once(__DIR__ . '/config/database.php'); 

//Récupération de la pizza sélectionnée en récupérant l'id dans l'url
$id = isset($_GET['id']) ? $_GET['id'] : 0;
// récup des infos de la pizza
$query = $db->prepare('SELECT * FROM pizza WHERE id = :id'); //:id est un paramètre
$query->bindValue(':id', $id, PDO::PARAM_INT); // on s'assure que l'id est bien un entier
$query-> execute(); // execute la requête
$pizza = $query->fetch();

// sans les verifs ça donne ça, mais bon, moins protégé :
// $query = $db->query('SELECT * FROM pizza WHERE id = '.$id);
// $pizza = $query->fetch($id);


//renvoyer une 404 si la pizza n'existe pas (pour éviter le référencement de nos "404" si l'utilisateur change l'id manuellement dans l'url)
if ($pizza === false) {
    http_response_code(404);
    echo "404";
    // On pourrait aussi rediriger l'utilisateur vers la liste des pizzas : 
    // header('Location: pizza_list.php');
    
    require_once(__DIR__.'/partials/header.php'); ?>
    <h1>404. Redirection dans 5 secondes...</h1>
    <script>
        setTimeout(function(){
            window.location = 'pizza_list.php';
        }, 5000);
    </script>
    <?php require_once(__DIR__.'/partials/footer.php');
    die();
}

$CurrentPageTitle = $pizza['name'];

// On inclue le fichier header.php sur la page :
require_once(__DIR__ . '/partials/header.php'); 
?>

    <main class="container mt-5">
        <h1 class="page-title"><?php echo $pizza['name']; ?></h1>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 card card-img-top-container" style="width: 18rem;">
                        <img class="card-img-top card-img-top-zoom-effect " src="assets/<?php echo $pizza['image']; ?>" alt="<?php echo $pizza['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $pizza['name']; ?></h5>
                            <p class="card-text">Une pizza pas si bonne que ça...</p>
                            <a href="#" class="btn btn-danger">Commandez</a>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>

    </main>



<?php 
// On inclue le fichier footer.php sur la page :
require_once(__DIR__ . '/partials/footer.php'); ?>