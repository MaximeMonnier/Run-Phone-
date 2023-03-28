<?php
    require "./header-admin.php";
    // recuperer les infos dans un var dump pour comprendre au moments de la validations des fichiers
    // <pre>
    // var_dump($_FILES);
    // </pre>
    // On vérifie si un fichier a été envoyé
if(isset($_POST["valider"])){
    if(isset($_POST["title"]) && !empty($_POST["title"])){

        $title = htmlspecialchars($_POST["title"]);

        if(isset($_FILES["image"]) && $_FILES["image"]["error"] === 0){
            // On a reçu l'image
            // On porcède aux vérification
            // On vérifie toujours l'extension et le type MIME
            $allowed = [
                "jpg" => "image/jpg",
                "jpeg" => "image/jpeg",
                "png" => "image/png"
            ];
            
            $filename = $_FILES["image"]["name"];
            $filetype = $_FILES["image"]["type"];
            $filesize = $_FILES["image"]["size"];
            $files_tmp_name = $_FILES['image']["tmp_name"];

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
            $newLinkname = "../uploads/$newname.$extension";
            

            //On déplace le fichier de tmp à uploads en le renommant 
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
                echo ("Le téléchargement à échouée");
            }

            // On envoie en bdd
            $sql = "INSERT INTO `images`(`title`, `link`) VALUES (:title, :link)";

            $query = $db->prepare($sql);
            $query->bindvalue(":title", $title, PDO::PARAM_STR);
            $query->bindvalue(":link", $newLinkname, PDO::PARAM_STR);
            $query->execute();

            // var_dump($newLinkname);
            // exit();

            //On interdit l'exécution du fichier
            chmod($newfilename, 0644);
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
                    <div class="col-2 color-primary-bg" id="info">
                        <div id="list" class="pt-5">
                            <a href="home.php" class="my-3"><p class="pt-3 ps-3 color-primary fs-6 font-robo text-dark">Retour a la page home</p></a>
                        </div>  
                    </div>
                    <!-- form upload -->
                    <div id="affichage-admin" class="col-10 color-yellow-bg">
                        <div class="container-fluid flex-column d-flex align-items-center">
                            <form method="post" enctype="multipart/form-data" class="content-upload mt-5">
                                <div class="container-fluid mt-3">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="d-flex my-2 fw-bolder font-mont color-second">
                                                <label class="lab1" for="title" style="width:
                                                    50px;margin-left:30px;">Titre :</label>
                                                <input class="inp1" type="text" name="title" id="title">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="d-flex my-2 fw-bolder font-mont color-second">
                                                <label class="lab1" for="fichier" style="width:
                                                    100px; margin-left:30px;">Fichier :</label>
                                                <input class="inp1" type="file" name="image" id="fichier">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="d-flex justify-content-center">
                                <button type="submit" name="valider"  class="btn color-second-bg mt-4 color-primary">Envoyer</button>
                                </div>
                            </form>
                        </div>
                        <!-- galerie -->
                        <div class="container-fluid mt-5" >
                            <div class="row d-flex justify-content-center">
                        <?php 
                            $recupImages = $db->query("SELECT * FROM images");
                            while($image = $recupImages->fetch()){
                        ?>
                            <div class="col-3 mx-2 container-img_upld">
                                <img src="<?= $image["link"]; ?>" class="image-upload" alt="<?= $image["title"]; ?>">
                                <h3 class="mt-3"><?= $image["title"]; ?></h3>              
                            </div>
                        <?php 
                        }
                        ?>
                            </div>
                        </div>
                        <!-- fin galerie -->
                    </div>
                    <!-- end form upload -->
                </div>
            </div>
        </section>
    </main>    
</body>
</html>