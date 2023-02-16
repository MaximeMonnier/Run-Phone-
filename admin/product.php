<?php
session_start();
$bdd = new PDO ('mysql:host=localhost;dbname=shopee;','root','');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous">

    <!-- Owl caroussel CDN -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- Font awesome icons -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- Custom CSS file -->

    <link rel="stylesheet"
        href="../css/product.css">

</head>

<body>
  <!--  navigation -->
  <section id="head">
        <nav class="navbar bg-warning border-bottom border-dark">
                <div class="container-fluid">
                <a href="home.php" class="navbar-brand"><img src="./assets/admin-pic/logo_1900X1350.png" class="image"></a>
                <div class="d-flex">
                <button class="btn fs-4"><a href="connexion.php">Deconnexion</a></button>
                </div>
            </div>
        </nav>
    </section>
    <!-- fin navigation -->

    <main id="main">

        <section id="colone-left">
        <ul>
            <li class="liens"><a href="addproduct.php">Ajouter produits</a></li>
            <li class="liens"><a href="home.php">Retour a la page home</a></li>
        </ul>
        </section>

        <!-- afficher tout les produits -->
        <section id="colone-right">
        <?php
        $recupProduct = $bdd->query('SELECT * FROM product');
            while($product = $recupProduct->fetch()){
                ?>
                    <div class="displaybdd">
                        <p class="itembdd"><?= $product['item_id'] ;?></p>
                        <p class="itembdd"><?= $product['item_brand'] ;?></p>
                        <p class="itembdd"><?= $product['item_name'] ;?></p>
                        <p class="itembdd"><?= $product['item_price'] ;?></p>
                        <img src="<?= $product['item_image'] ?? "./assets/products/1.png" ;?>" alt="product" class="imagebdd">
                        <p class="itembdd"><?= $product['item_register'] ;?></p>
                        <a href="modifierproduct.php?id=<?= $product['item_id'] ?>;"><button class="modifier-btn">Modifier Produit</button></a>
                        <a href="deleteproduct.php?id=<?= $product['item_id'];?>"><button class="delete-btn">Supprimer Produit</button>
                        <br></a>
                    </div>
                    <?php
            }
            ?>
        </section>        
        <!--  fin afficher tout les produits --> 
    </main>

        <section class="foot bg-warning fs-3">
                <a href="#">GO UP</a>
        </section>

    <!-- JavaScript Bundle with Popper bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymougs"></script>

    <!-- jquey js file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        

    <!-- owl caroussel js file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

    <!-- isotop plugin cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- custom javascript -->
    <script src="./index.js "></script>

</body>

</html>