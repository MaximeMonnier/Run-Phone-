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
    <title>Ajouter un article</title>

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
        href="../css/addproduct.css">

</head>

<body>

    <section id="head">
        <ul class="nav justify-content-end bg-warning">
                <li class="nav-item">
        <a class="nav-link active text-secondary" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
                <a class="nav-link text-secondary" href="#">Link</a>
        </li>
        <li class="nav-item">
                <a class="nav-link text-secondary" href="#">Link</a>
        </li>
        <li class="nav-item">
                <a href="logout.php" class="nav-link text-secondary">Deconnexion</a>
        </li>
        </ul>
    </section>

    <main id="main">
        <section id="colone-left">
        <ul>
            <li class="liens"><a href="product.php">Afficher les produits</a></li>
            <li class="liens"><a href="blog.php">Afficher les blogs</a></li>
        </ul>
        </section>

        <?php
            if(isset($_POST['envoie'])){
                if(!empty($_POST['marque']) AND !empty($_POST['titre']) AND !empty($_POST['prix']) AND !empty($_POST['image']) AND !empty($_POST['date'])){
                    $marque = htmlspecialchars($_POST['marque']);
                    $titre = htmlspecialchars($_POST['titre']);
                    $prix = htmlspecialchars($_POST['prix']);
                    $image = htmlspecialchars($_POST['image']);
                    $date = htmlspecialchars($_POST['date']);

                    $inserProduct = $bdd->prepare('INSERT INTO product(item_brand,item_name,item_price,item_image,item_register) VALUES(?,?,?,?,?)');
                    $inserProduct->execute(array($marque,$titre,$prix,$image,$date));

                    echo "Le Produit a bien été ajouter";
                }else{
                    echo "Veuillez Ajouter un titre et une marque";
                }
            }
        ?>

        <section class="colone-right">
            <form method="post" class="formulaire">
                <label for="marque" class="lab">Marque</label>
                <input type="text" name="marque" id="marque" class="inp">
                <br>
                <label for="titre"class="lab">Titre</label>
                <input type="text" name="titre" id="titre"class="inp">
                <br>
                <label for="prix"class="lab">Prix</label>
                <input type="text" name="prix" id="prix"class="inp">
                <br>
                <label for="image"class="lab">Image</label>
                <input type="text" name="image" id="image"class="inp">
                <br>
                <label for="date"class="lab">Date</label>
                <input type="text" name="date" id="date"class="inp">
                <br>
                <input type="submit" name="envoie" class="val-btn">
            </form>
        </section>
    </main>

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