<?php
include "./header-admin.php";
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];

    $recupproduct = $bdd->prepare('SELECT * FROM product WHERE item_id = ?');
    $recupproduct->execute(array($getid));
    if($recupproduct->rowCount() > 0){
        $productinfo = $recupproduct->fetch();
        $marque = $productinfo['item_brand'];
        $titre = $productinfo['item_name'];
        $prix = $productinfo['item_price'];
        $image = $productinfo['item_image'];
        $date = $productinfo['item_register'];

        if(isset($_POST['valider'])){
            $marque_saisie = htmlspecialchars($_POST['marque']);
            $titre_saisie = htmlspecialchars($_POST['titre']);
            $prix_saisie = htmlspecialchars($_POST['prix']);
            $image_saisie = htmlspecialchars($_POST['image']);
            $date_saisie = htmlspecialchars($_POST['date']);
    
            $updateproduct = $bdd->prepare('UPDATE product SET item_brand = ? , item_name = ? , item_price = ? , item_image = ? , item_register = ? WHERE item_id = ?');
            $updateproduct->execute(array($marque_saisie,$titre_saisie,$prix_saisie,$image_saisie,$date_saisie,$getid));
            header('Location: product.php');
        }

    }else{
        echo "Aucun produits trouver";
    }

    }else{
        echo "Aucun identifiant trouver";
}
?>
<body>
    <main>
        <section id="user-info">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 color-primary-bg" id="info" style="height: 100vh;">
                        <div id="list" class="pt-5">
                            <a href="product.php" class="my-3"><p class="pt-3 ps-3 color-primary fs-6 font-robo text-dark">Afficher les produits</p></a>
                            <a href="blog.php" class="my-3"><p class="pt-3 ps-3 color-primary fs-6 font-robo text-dark">Afficher les article de blogs</p></a>
                        </div>  
                    </div>
                    <div id="affichage-admin" class="col-10">
                        <div class="row">
                                <div class="col-5">
                                    <!-- formulaire de modification -->
                                    <section id="inscription" class="px-5">
                                    <h1 class="font-mont color-second my-4">Modifier un produits</h1>
                                        <form method="post">
                                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                                <label for="marque" class="lab">Marque</label>
                                                <input type="text" name="marque" class="inp" id="marque" value="<?= $marque ;?>">
                                            </div>
                                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                                <label for="titre" class="lab">Titre</label>
                                                <input type="text"class="inp" name="titre" id="titre"value="<?= $titre;?>">
                                            </div>
                                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                                <label for="prix" class="lab">Prix</label>
                                                <input type="text"class="inp" name="prix" id="prix"value="<?= $prix;?>">
                                            </div>
                                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                                <label for="image" class="lab">Image</label>
                                                <input type="text"class="inp" name="image" id="image"value="<?= $image;?>">
                                            </div>
                                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                                <label for="date" class="lab">Date</label>
                                                <input type="text" name="date" class="inp" id="date"value="<?= $date;?>">
                                            </div>
                                            <button type="submit" name="valider" class="btn color-primary-bg mt-3 text-dark">Modifier</button>
                                        </form>
                                    </section>
                                </div>
                                <!-- fin du formulaire de modification -->
                                <!-- affichage produit a mofidier -->
                                <div class="col-5">
                                <div class="card" style="width: 28rem;">
                                        <div class="card-body">
                                        <p class="itembdd"><?= $marque;?></p>
                                            <p class="itembdd"><?= $titre ;?></p>
                                            <p class="itembdd"><?= $prix;?></p>
                                            <img src="<?= $image ?? "../assets/products/1.png" ;?>" alt="product" style="height:50px;width:50px;">
                                            <p class="itembdd"><?= $date ;?></p>
                                            </a>
                                            </div>
                                        </div>
                                            <!-- affichage produit a mofidier -->
                                <!-- fin affichage produit a mofidier -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>    
    </body>
</html>
