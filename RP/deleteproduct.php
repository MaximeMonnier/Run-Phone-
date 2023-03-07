<?php
require "../database/_DBconnexion.php";
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupproduct = $db->prepare('SELECT * FROM product WHERE item_id = ?');
    $recupproduct->execute(array($getid));
    if($recupproduct->rowCount() > 0){
        $deleteproduct = $db->prepare('DELETE FROM product WHERE item_id = ?');
        $deleteproduct->execute(array($getid));
        header('Location: product.php');
        echo "L'article a bien été suprimer";
        }else{
        echo"Aucun produits n'a été trouver";
    }
}else{
    echo"Aucun identifiant n'a été trouver";
}
?>