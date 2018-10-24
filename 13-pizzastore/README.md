# Pizza Store PDO SQL

- Récupérer un backup de la base pizzastore  
(l'intérêt est de pouvoir recréer la structure de la base à tout moment.)  

Au niveau du PHP, on va créer quelques fichiers / dossiers :
- config/database.php -> Connexion à la base de données en PDO, sera inclus dans tous les fichiers PHP
- config/config.php -> Stocke toutes les variables globales
- partials/header.php -> Le header du site à inclure dans toutes les pages (Bootstrap CDN)
- partials/footer.php -> Le header du site à inclure dans toutes les pages
- index.php -> La page d'accueil du site
- pizza_list.php -> Lister toutes les pizzas de la base de données
- pizza_single.php -> La page d'une pizza seule  


Au niveau du front :
- assets/ -> Dossier qui contiendra le css, le js, les images
- assets/css/style.css
- assets/js/script.js
- assets/img/