<?php 
// On inclue le fichier header.php sur la page :
require_once(__DIR__ . '/partials/header.php'); 

    //Récupération de la liste des logements
    $query = $db->query('SELECT * FROM logement');
    $logements = $query->fetchAll();
?>







    <main class="container">
        <h1>Liste des logements</h1>

        <div class="row">
            <?php 
            //on affiche la liste des logements
            foreach ($logements as $logement) { ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-img-top-container">
                            <img class="card-img-top card-img-top-zoom-effect" src="assets/<?php echo $logement['photo']; ?>" alt="<?php echo $logement['titre']; ?>">
                        </div>                       
                        <div class="card-body">
                            <h5 class="card-title">Titre : <?php echo $logement['titre']; ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><h5>Adresse : </h5><?php echo cutText($logement['adresse']); ?></li>
                            <li class="list-group-item"><h5>Ville : </h5><?php echo $logement['cp'] . ' - ' . cutText($logement['ville']); ?></li>
                            <li class="list-group-item"><h5>Type d'aquisition : </h5><?php echo $logement['type']; ?></li>
                            <li class="list-group-item"><h5>Surface : </h5><?php echo $logement['surface']; ?></li>
                            <li class="list-group-item"><h5>Prix : </h5><?php echo $logement['prix']; ?></li>
                            <li class="list-group-item"><h5>Description : </h5><?php echo cutText($logement['description']); ?></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>



    </main>


    <?php 
// On inclue le fichier footer.php sur la page :
require_once(__DIR__ . '/partials/footer.php'); ?>