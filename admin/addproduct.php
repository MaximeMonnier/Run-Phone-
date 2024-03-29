<?php
include "./header-admin.php";

if(isset($_POST['envoie'])){
    if(!empty($_POST['marque']) AND !empty($_POST['titre']) AND !empty($_POST['prix']) AND !empty($_POST['date'])){

        // sécurisation des champs inputs
        $marque = htmlspecialchars($_POST['marque']);
        $titre = htmlspecialchars($_POST['titre']);
        $prix = htmlspecialchars($_POST['prix']);
        $date = htmlspecialchars($_POST['date']);

        if(isset($_FILES["image"]) && $_FILES["image"]["error"] === 0){
            // On a reçu l'image
            // On porcède aux vérification
            // On vérifie toujours l'extension et le type MIME
            $allowed = [
                "jpg" => "image/jpg",
                "jpeg" => "image/jpeg",
                "png" => "image/png"
            ];

            // var_dump($_FILES);
            // exit();
            
            $filename = $_FILES["image"]["name"];
            $filetype = $_FILES["image"]["type"];
            $filesize = $_FILES["image"]["size"];
            $filepath = $_FILES['image']['full_path'];

            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            //On vérifie l'absence de l'exrension dans les clés de $allowed ou l'absence de type MIME dans les valeurs
            if(!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)){
                // Ici soit l'extension soit le type est incorrect
                echo("Erreur: Format de ficheir incorrect");
            }
            // Ici le type est correcte
            // On limite a 1Mo 
            if($filesize > 1024 * 1024){
                echo("Fichier trop voluminuex");
            }
            // On génère un nom unique
            $newname = md5(uniqid());
            // on génère le chemin complet
            $newfilename = dirname(__DIR__) . DIRECTORY_SEPARATOR . "uploads/$newname.$extension";
            $newLinkname = "../uploads-toto/$filepath.$extension";
            $newlinkname = "./uploads-toto/$filepath.$extension";
            //On déplace le fichier de tmp à uploads en le renommant 
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
                echo ("Le téléchargement à échouée");
            }
            // On redimentionne l'image
            // On récupère les infos de l'image 
            $info = getimagesize($newfilename);
            // var_dump($newfilename);
            // var_dump($_FILES);
            // var_dump($info);
            // exit();
            $largeur = 200;
            $hauteur = 200;
            // On crée une nouvelle images vierges en mémoire
            $nouvelleImage = imagecreatetruecolor($largeur, $hauteur);
            switch($info['mime']){
                case "image/png":
                    // On ouvre l'image png 
                    $imageSource = imagecreatefrompng($newfilename);
                    break;
                    // on ouvre l'image jpeg
                case "image/jpeg":
                    $imageSource = imagecreatefromjpeg($newfilename);
                    break;
                case "image/jpg":
                    // On ouvre l'image jpg 
                    $imageSource = imagecreatefrompng($newfilename);
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
                $largeur, // largeur dans l'image de destinantions
                $hauteur, // hauteur dans l'image de destinantions
                $largeur, // largeur dans l'image source
                $hauteur // hauteur dans l'image source
            ); 
            // On enregsitre la nouvelle image sur le serveur
            switch($info["mime"]){
                case "image/png":
                    // On enregistre l'image
                    imagepng($nouvelleImage, dirname(__DIR__) . DIRECTORY_SEPARATOR . "uploads/toto-" . $filepath);
                    break;
                case "image/jpeg":
                    // On enregistre l'image
                    imagejpeg($nouvelleImage, dirname(__DIR__) . DIRECTORY_SEPARATOR . "uploads/toto-" . $filepath);
                    break;
            }
            // On détruit les images dans la mémoire 
            imagedestroy($imageSource);
            imagedestroy($nouvelleImage);
            // On envoie en bdd
            $sql = "INSERT INTO `product`(`item_brand`, `item_name`, `item_price`, `item_image`, `item_image_bdd`, `item_register`) VALUES (:item_brand, :item_name, :item_price, :item_image, :item_image_bdd, :item_register)";

            $query = $db->prepare($sql);
            $query->bindvalue(":item_brand", $marque, PDO::PARAM_STR);
            $query->bindvalue(":item_name", $titre, PDO::PARAM_STR);
            $query->bindvalue(":item_price", $prix, PDO::PARAM_STR);
            $query->bindvalue(":item_image", $newLinkname, PDO::PARAM_STR);
            $query->bindvalue(":item_image_bdd", $newlinkname, PDO::PARAM_STR);
            $query->bindvalue(":item_register", $date, PDO::PARAM_STR);
            $query->execute();

            // var_dump($newLinkname);
            // exit();

            //On interdit l'exécution du fichier
            chmod($newfilename, 0644);
            echo("le produits a bien été ajouter");
        }
    }else{
        echo "Les calcul ne sont pas bon kévin";
    }
}
?>
<body>
    <main>
        <section id="user-info">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 color-primary-bg" id="info" style="height: 100vh;">
                        <div id="list" class="pt-5">
                            <a href="product.php"class="my-3"><p class="pt-3 ps-3 color-primary fs-6 font-robo text-dark">Afficher les produits</p></a>
                            <a href="blog.php" class="my-3"><p class="pt-3 ps-3 color-primary fs-6 font-robo text-dark">Afficher les article de blogs</p></a>
                        </div>  
                    </div>
                    
                    <div id="affichage-admin" class="col-10">
                        <div class="col pb-3">
                        <section id="inscription" class="py-5 px-5" style="height: 100%; width:35%">
                        <h1 class="font-mont color-second my-4">Ajouter un produits</h1>
                        <form method="post" enctype="multipart/form-data">
                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                <label for="marque" class="lab">Marque</label>
                                <input type="text" name="marque" id="marque" class="inp">
                            </div>
                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                <label for="titre"class="lab">Titre</label>
                                <input type="text" name="titre" id="titre"class="inp">
                            </div>
                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                <label for="prix"class="lab">Prix</label>
                                <input type="text" name="prix" id="prix"class="inp">
                            </div>
                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                <label for="image"class="lab">Image</label>
                                <input type="file" name="image" id="image"class="inp">
                            </div>
                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                <label for="date"class="lab">Date</label>
                                <input type="text" name="date" id="date"class="inp">
                            </div>
                            <button type="submit" name="envoie" class="btn color-primary-bg mt-3 text-dark">Ajouter</button>
                        </form>
                        </section>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </main>    
</body>
</html>