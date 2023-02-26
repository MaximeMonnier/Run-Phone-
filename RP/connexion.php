<?php
// étape n°= 1 on déclare la session qui nous permet d'échanger des informations partout sur notre projets et qui vérifie si l'utilisateurs est bien connecter.
session_start();
// étape n°= 2 je déclare dans la functions "isset" la super global ($_POST) qui prend le nom de mon 'input submit' de mon formualire je lui demande si elle existe, si oui execute étape 2 sinon 'else',  
if(isset($_POST['valider'])){
    // étape n°= 3 dans la fonction empty je déclare la super global ($_POST) qui porte le nom des mes 'inputs' qui servent d'ientifiant, je lui demande si les 'imputs' ne sont pas vide fait moi l'étape 3 sinon 'else',
    if(!empty($_POST['name']) AND !empty($_POST['mdp'])){
        // étape n°= 4 j'établie mes variables de connexion,
        $name_par_defaut = "maxime";
        $mdp_par_defaut = "maxime1234";
        // étape n°= 5 je sécurise mes 'champs inputs' contre les faille XSS avec la focntion "htmlspecialchars" qui sert a effacer les balise de script entrer dans mes 'champs inputs' apr des utilisateur malveillant,
        $name_saisie = htmlspecialchars($_POST['name']);
        $mdp_saisie = htmlspecialchars($_POST['mdp']);
        // étape n°= 6 je compare mes les donnéess saisie dans mes 'champs inputs' et les données de mes variable de connexion, je lui demande de comparer les données, si elle sont identique tu accorde laccès a la page 'home.php' de mon espace admin et exécute l'étape n°= 7 sinon refus on renvoie 'else',
        if($name_par_defaut == $name_saisie AND $mdp_par_defaut == $mdp_saisie){
            // étape n°= 7 j'accorde l'acces au pages de l'esapce adimis avec la session et redirige l'admin sur la page home.
            $_SESSION['mdp'] = $mdp_saisie;
            header("Location: ./home.php");
        } else{
            echo"Les informations de connexion ne sont pas correcte";
        }
    }else{
        echo "Veuillez compléter tout les champs";
    }
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
    <title>Admin connexion</title>

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

<body>
    <main>
        <section id="presentation" class="d-flex justify-content-center mt-5">
            <h1 ><a href="../index.php" class="text-dark">Admin <img src="../assets/admin-pic/logo PR Simple.png" alt="logo RN" style="height:70px;width:70px;border-radius:100%;"></a></h1>
        </section>

        <section id="main">
            <div class="container-fluid d-flex justify-content-center py-5">
                <div class="row">
<!-- Section connexion -->
                    <div class="col">
                        <section id="connexion" class="py-5 px-5 color-primary-bg">
                        <h1 class="font-mont color-second my-4">Connexion</h1>
                            <form method="post">
                                <div class="d-flex flex-column my-2 fw-bolder font-mont color-second">
                                    <label class="lab1" for="cname">Name :</label>
                                    <input class="inp1" type="text" name="name" id="cname" autocomplete="off">
                                </div>
                                <div class="d-flex flex-column my-2 fw-bolder font-mont color-second">
                                    <label class="lab2" for="cmdp">MDP : </label>
                                    <input class="inp1" type="password" name="mdp" id="cmdp" >
                                </div>
                                <button type="submit" name="valider"  class="btn color-second-bg mt-3 color-primary">Me connecter</button>
                            </form>
                        </section>
                    </div>
            <!-- ! fin Section connexion -->
                </div>
            </div>
        </section>
    </main>



    
</body>
</html>