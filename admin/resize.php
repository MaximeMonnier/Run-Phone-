<?php 

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
// require autoload
require '../vendor/autoload.php';

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();
// Nom de l'image à manipuler
$fichier = "toto-5.png";

$image = dirname(__DIR__) . DIRECTORY_SEPARATOR . "uploads/$fichier";
// echo $image;

// On récupère les infos de l'image 
$info = getimagesize($image);
var_dump($info);
exit();
$largeur = $info[0];
$hauteur = $info[1];

// On crée une nouvelle images vierges en mémoire

$nouvelleImage = imagecreatetruecolor($largeur / 4, $hauteur / 4);

switch($info['mime']){
    case "image/png":
        // On ouvre l'image png 
        $imageSource = imagecreatefrompng($image);
        break;
        // on ouvre l'image jpeg
    case "image/jpeg":
        $imageSource = imagecreatefromjpeg($image);
        break;
    case "image/jpg":
        // On ouvre l'image jpg 
        $imageSource = imagecreatefrompng($image);
        break;
    default:
        die("format d'image incorrect");
}

// On copie toute l'image source dans l'image destination en la réduisant
imagecopyresampled(
    $nouvelleImage, // image de destinations
    $imageSource, // Image de départ
    0, // positions en x du coin supérieur gauche dans l'image de destinations
    0, // positions en y du coin supérieur gauche dans l'image de destinations
    0, // positions en x du coin supérieur gauche dans l'image source
    0, // positions en y du coin supérieur gauche dans l'image source
    $largeur / 4, // largeur dans l'image de destinantions
    $hauteur / 4, // hauteur dans l'image de destinantions
    $largeur, // largeur dans l'image source
    $hauteur // hauteur dans l'image source
); 

// On enregsitre la nouvelle image sur le serveur
switch($info["mime"]){
    case "image/png":
        // On enregistre l'image
        imagepng($nouvelleImage, dirname(__DIR__) . DIRECTORY_SEPARATOR . "uploads/toto-" . $fichier);
        break;
    case "image/jpg":
        // On enregistre l'image
        imagepng($nouvelleImage, dirname(__DIR__) . DIRECTORY_SEPARATOR . "uploads/toto-" . $fichier);
        break;
    case "image/jpeg":
        // On enregistre l'image
        imagejpeg($nouvelleImage, dirname(__DIR__) . DIRECTORY_SEPARATOR . "uploads/toto-" . $fichier);
        break;
}

// On détruit les images dans la mémoire 

imagedestroy($imageSource);
imagedestroy($nouvelleImage);