<?php
    require "./header-admin.php";
    // On vérifie si un fichier a été envoyé
if(isset($_FILES["image"]) && $_FILES["image"]["error"] === 0){
    // On a reçu l'image
    // On porcède aux vérification
    // On vérifie toujours l'extension et le type MIME
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
                                    <div class="d-flex flex-column my-2 fw-bolder font-mont color-second">
                                        <label class="lab2" for="cmdp">MDP : </label>
                                        <input class="inp1" type="password" name="mdp" id="cmdp" >
                                    </div>
                                    <button type="submit" name="valider"  class="btn color-second-bg mt-3 color-primary">Me connecter</button>
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