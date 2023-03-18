<?php
    // recuperer les infos dans un var dump pour comprendre au moments de la validations des fichiers
    // <pre>
    // var_dump($_FILES);
    // </pre>
    require "./header-admin.php";
    // On vérifie si un fichier a été envoyé
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

    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    //On vérifie l'absence de l'exrension dans les clés de $allowed ou l'absence de type MIME dans les valuers
    if(!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)){
        // Ici soit l'extension soit le type est incorrect
        echo("Erreur: Format de ficheir incorrect");
    }

    // Ici le type est correcte
    // On limite a 1Mo 
    if($filesize > 1024*1024){
        echo("Fichier trop voluminuex");
    }

    // On génère un nom unique
    $newname = md5(uniqid());
    // on génère le chemin complet
    $newfilename = dirname(__DIR__) . DIRECTORY_SEPARATOR . "uploads/$newname.$extension";
    // var_dump($_FILES);
    // var_dump( dirname(__DIR__));
    // exit();

    //On déplace le fichier de tmp à uplaods en le renommant 
    if(!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
        echo ("Le téléchargement à échouée");
    }

    //On interdit l'exécution du fichier
    chmod($newfilename, 0644);
}


?>

<body>
    <main>
        <section id="user-info">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 color-primary-bg" id="info" style="height: 100vh;">
                        <div id="list" class="pt-5">
                            <a href="addproduct.php" class="my-3"><p class="pt-3 ps-3 color-primary fs-6 font-robo text-dark">Ajouter produits</p></a>
                            <a href="home.php" class="my-3"><p class="pt-3 ps-3 color-primary fs-6 font-robo text-dark">Retour a la page home</p></a>
                        </div>  
                    </div>
                    <div id="affichage-admin" class="col-10 color-yellow-bg">
                        <div class="container-fluid">
                            <div class="col-3">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="d-flex flex-column my-2 fw-bolder font-mont color-second">
                                        <label class="lab1" for="fichier">Fichier :</label>
                                        <input class="inp1" type="file" name="image" id="fichier">
                                    </div>
                                    <button type="submit" name="valider"  class="btn color-second-bg mt-3 color-primary">Envoyer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>    
</body>
</html>