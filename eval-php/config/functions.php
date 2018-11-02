<?php
require_once(__DIR__ . '/../config/database.php'); 

//////////////////////////////////////////////////////////////
//Fonction qui vérifie la longueur d'un texte, si celui-ci dépasse 40 caractères, 
// alors retourne les 40 1ers caractères suivis de "..." (exercice 4).
function cutText($txt){
    //nb de caractères du texte reçu
    $length = strlen($txt);
    // texte traité
    $text = $txt;

    if ($length > 40) {
        $text = substr($text, 0, 40);
        $text .= '...';
        return $text;
    }
}
//////////////////////////////////////////////////////////////
// Procédure qui renomme le fichier, et crée un second fichier redimentionné (Exercice 5)
function renameAndCreateMini($imageName, $idLgt){

    //récupère l'extension de l'image
    $photoExtension = pathinfo($imageName, PATHINFO_EXTENSION);//new SplFileInfo($imageName);;
    
    //récupère le nom d'origine du fichier
    $photoNameOrigin = $imageName;
    
    //récupére l'id du logement
    $idLogement = $idLgt;

    // on renomme « mon-appart.jpg » en « logement_38.jpg »
    $photoRenamed = rename($photoNameOrigin, "logement_" . $idLogement . "." . $photoExtension);
    
    //On crée une copie de l'image d'origine, redimenssionnée et renommée
    $photoRenamedAndResized = imagethumb($photoNameOrigin, $photoRenamed, 90);
    move_uploaded_file($photoRenamedAndResized, __DIR__.'/assets/img/'.$photoRenamedAndResized);
    //return $photoRenamedAndResized;
}
//////////////////////////////////////////////////////////////
