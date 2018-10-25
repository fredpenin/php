<?php 
$CurrentPageTitle = 'Nos pizzas';
// On inclue le fichier header.php sur la page :
require_once(__DIR__ . '/partials/header.php'); 

    //Récupération de la liste des pizzas
    $query = $db->query('SELECT * FROM pizza');
    $pizzas = $query->fetchAll();
?>

    <main class="container mt-5">
        <h1 class="page-title">Liste des pizzas</h1>

        <div class="row">
            <?php 
            //on affiche la liste des pizzas
            foreach ($pizzas as $pizza) { ?>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-img-top-container">
                            <img class="card-img-top card-img-top-zoom-effect" src="assets/<?php echo $pizza['image']; ?>" alt="<?php echo $pizza['name']; ?>">
                            <span class="price-img-tag">
                                <?php echo formatPrice($pizza['price']); ?>
                            </span>
                        </div>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $pizza['name']; ?></h5>          
                            <!-- on envoie d'id de la pizza dans l'url -->             
                            <a href="pizza_single.php?id=<?php echo $pizza['id']; ?>" class="btn btn-danger">Commandez</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </main>


<?php 
// On inclue le fichier footer.php sur la page :
require_once(__DIR__ . '/partials/footer.php'); ?>