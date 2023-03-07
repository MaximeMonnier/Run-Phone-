<?php
// On déclare la connexion  la base de données
require "../database/_DBconnexion.php";
// on déclare la session qui nous permet d'échanger des informations partout sur notre projet qui vérifie si l'utilisateur est bien connecté.
session_start(); 
// je déclare dans la fonction "isset" la super global ($_POST) qui prend le nom de mon 'input submit' du formulaire je lui demande si elle existe, si oui exécute étape suivante sinon 'else',
if(isset($_POST['valider'])){
    //dans la fonction ‘empty’ je déclare la super global ($_POST) qui porte le nom des 'inputs' qui servent d'identifiant, je lui demande si les 'imputs' ne sont pas vide fait moi l'étape 3 sinon 'else',
    if(isset($_POST['name'], $_POST["mdp"]) && !empty($_POST['name']) && !empty($_POST["mdp"])
    ){
        //on sécurise et vérifie l'email,
        $name = htmlspecialchars(filter_var($_POST["name"], FILTER_VALIDATE_EMAIL));
        if(!$name){
            echo "Le format de l'email est incorrecte";
        }
        // ici sécurise le mdp
        $pass = htmlspecialchars($_POST["mdp"]);

        //Creation de la requete
        $sql = "SELECT * FROM `user` WHERE `user_mail` = :email";

        //preparation de la requete
        $query = $db->prepare($sql);
        $query->bindValue(":email", $_POST['name'], PDO::PARAM_STR);
        // étape n°= 8 execution de la requete
        $query->execute();

        //on fecth les données pour les comparer
        $admin = $query->fetch();

       //on stock dans $_SESSION les informations de l'utilisateurs si son identifiant est correct
        if($admin && password_verify($pass, $admin["user_pass"])){
         // Vérification de l'identifiant unique de l'utilisateur
            if($admin['user_role'] == "ROLE_ADMIN"){ 
                $_SESSION["admin"] = [
                    "nom" => $admin["last_name"],
                    "prenom" => $admin["first_name"],
                    "mail" => $admin["user_mail"]
                ];
                //on redirige vers la page de profil
                header("Location: home.php");
            } else {
                echo "Vous n'êtes pas autorisé à accéder à cette page.";
            }
        } else {
            echo "L'utilisateurs et/ou le mot de passe est incorrect";
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
