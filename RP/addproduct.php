<?php
include "./header-admin.php";
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
                    <?php
                            if(isset($_POST['envoie'])){
                                if(!empty($_POST['marque']) AND !empty($_POST['titre']) AND !empty($_POST['prix']) AND !empty($_POST['image']) AND !empty($_POST['date'])){
                                    $marque = htmlspecialchars($_POST['marque']);
                                    $titre = htmlspecialchars($_POST['titre']);
                                    $prix = htmlspecialchars($_POST['prix']);
                                    $image = htmlspecialchars($_POST['image']);
                                    $date = htmlspecialchars($_POST['date']);
                                    $inserProduct = $db->prepare('INSERT INTO product(item_brand,item_name,item_price,item_image,item_register) VALUES(?,?,?,?,?)');
                                    $inserProduct->execute(array($marque,$titre,$prix,$image,$date));
                                    die ("Le Produit a bien été ajouter");
                                }else{
                                    die ("Veuillez Ajouter un titre et une marque");
                                }
                            }
                        ?>
                    <div id="affichage-admin" class="col-10">
                        <div class="col pb-3">
                        <section id="inscription" class="py-5 px-5" style="width: 35%;height:25%;">
                        <h1 class="font-mont color-second my-4">Ajouter un produits</h1>
                        <form method="post">
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
                                <input type="text" name="image" id="image"class="inp">
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