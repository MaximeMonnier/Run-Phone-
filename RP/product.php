<?php
include "./header-admin.php";
// if(!isset($_SESSION['mdp'])){
//     header("Location: connexion.php");
//     exit();
// } 
?>

<body>
    <main>
        <section id="user-info">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 color-primary-bg" id="info">
                        <div id="list" class="pt-5">
                            <a href="addproduct.php" class="my-3"><p class="pt-3 ps-3 color-primary fs-6 font-robo text-dark">Ajouter produits</p></a>
                            <a href="home.php" class="my-3"><p class="pt-3 ps-3 color-primary fs-6 font-robo text-dark">Retour a la page home</p></a>
                        </div>  
                    </div>
                    <div id="affichage-admin" class="col-10 color-yellow-bg">
                        <div class="container-fluid">
                            <div class="row">
                
                        <?php
                        $recupProduct = $db->query('SELECT * FROM product');
                            while($product = $recupProduct->fetch()){ 
                                ?>
                                    <!-- <div class="col-1"> -->
                                        <div class="card" style="width: 28rem;">
                                        <div class="card-body">
                                            <p class="card-text"></p>
                                            <p class="card-text"><?= $product['item_id'] ;?></p>
                                            <p class="card-text"><?= $product['item_brand'] ;?></p>
                                            <p class="card-text"><?= $product['item_name'] ;?></p>
                                            <p class="card-text"><?= $product['item_price'] ;?></p>
                                            <img src="<?= $product['item_image'] ?? "./assets/products/1.png" ;?>" alt="product" style="height: 50px; width:50px;" >
                                            <p class="itembdd"><?= $product['item_register'] ;?></p>
                                            <a href="modifierproduct.php?id=<?= $product['item_id'] ?>;"><button class="btn color-second-bg">Modifier Produit</button></a>
                                            <a href="deleteproduct.php?id=<?= $product['item_id'];?>"><button class="btn color-primary-bg">Supprimer Produit</button>
                                        <br></a>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>    
</body>
</html>

