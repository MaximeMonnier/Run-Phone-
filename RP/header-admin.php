<?php
session_start();
require "../database/_DBconnexion.php";
if(!$_SESSION['admin']){
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
    <title>Run Phone Inscription</title>
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
      <!-- Custom CSS file -->
      <link rel="stylesheet"
        href="../style.css">    
    <!-- Font awesome icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

</head>
    <!-- start #header -->
    <header id="header">
        <!-- Primary Navigation -->
        <!--  navigation -->
            <section id="head">
                <nav class="navbar color-primary-bg border-bottom border-dark" style="position:absolute;z-index:10;width:100%;">
                        <div class="container-fluid">
                        <a href="./home.php" class="navbar-brand"><img src="./assets/admin-pic/logo_1900X1350.png" class="image-fluid" style="height: 100px;width:200px;"></a>
                        <div class="d-flex">
                        <button class="btn fs-4"><a href="./deconnexion-admin.php">Deconnexion</a></button>
                        </div>
                    </div>
                </nav>
            </section>
    <!-- fin navigation -->
    </header>
    <!-- !Primary Navigation -->