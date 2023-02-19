<?php
//on démarre la session PHP
session_start();
if(isset($_SESSION['user'])){
    header("Location: ../espace-user/_profil.php");
    exit();
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
    <title>Run Phone connexion</title>

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
        <section id="presentation" class="d-flex justify-content-center my-5">
            <h1 ><a href="../index.php" class="text-dark">Run Phone <img src="../assets/admin-pic/logo PR Simple.png" alt="logo RN" style="height:70px;width:70px;border-radius:100%;"></a></h1>
        </section>

        <section id="main">
            <div class="container-fluid d-flex justify-content-center py-5">
                <div class="row">
    <?php
    //on verifie si tout les champs obligatoire du fom sont bien remplie
    if(isset($_POST["VI"])){
        if(isset($_POST["last_name"], $_POST["first_name"], $_POST["user_pass"], $_POST["user_mail"]) && !empty($_POST["last_name"]) && !empty($_POST["first_name"]) && !empty($_POST["user_pass"]) && !empty($_POST["user_mail"])){

        //on recupère les données en les protégents
        $nom = strip_tags($_POST["last_name"]);
        $prenom = strip_tags($_POST["first_name"]);
        $mail = (!filter_var($_POST["user_mail"], FILTER_VALIDATE_EMAIL));

        if ($mail) {
            die("L'adresse email est incorecte ");
        }
        //on va hacher le mdp
        $pass = password_hash($_POST["user_pass"], PASSWORD_ARGON2ID);

        //on enregistre en bdd

        // var_dump(dirname(dirname(__DIR__)));
        // exit();
        // $database = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'database/DBControler.php';
        // require "$database";
        require_once "./database/_DBconnexion.php";

        $sql = "INSERT INTO `user`(`last_name`, `first_name`, `user_mail`, `user_pass`, `user_role`, `user_date`) VALUES (:nom, :prenom, :email, '$pass', :user_role, NOW())";

        $query = $db->prepare($sql);

        $query->bindvalue(":nom", $nom, PDO::PARAM_STR); 
        $query->bindvalue(":prenom", $prenom, PDO::PARAM_STR); 
        $query->bindvalue(":email", $_POST['user_mail'], PDO::PARAM_STR); 
        $query->bindvalue(":user_role", '[\"ROLE_USER"\]', PDO::PARAM_STR); 

        $query->execute();

        // on récupère l'id du nouvelle utilisateur 
        $id = $db->lastInsertId();

        //on connecte l'utilisateurs
 
        //on stock dans $_SESSION les informations de l'utilisateurs
        $_SESSION["user"] = [
            "id" => $id,
            "nom" => $nom,
            "prenom" => $prenom,
            "mail" => $user["user_mail"],
            "date" => $user["user_date"]
        ];

        //on redirige vers la page de profil
        header("Location: _profil.php");



    }else{
       die ("Le formulaire n'est pas complet");
    }
}
?>
        <!-- Section inscription -->
                    <div class="col">
                        <section id="inscription" class="py-5 px-5">
                        <h1 class="font-mont color-second my-4">Inscription</h1>
                        <form method="post">
                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                <label for="last_name">Nom</label>
                                <input type="text" name="last_name" id="last_name" autocomplete="off">
                            </div>
                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                <label for="first_name">Prénom</label>
                                <input type="text" name="first_name" id="first_name" autocomplete="off">
                            </div>
                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                <label for="user_mail">e-mail</label>
                                <input type="email" name="user_mail" id="user_mail" autocomplete="off">
                            </div>
                            <div class="d-flex flex-column my-2 fw-bolder font-mont color-primary">
                                <label for="user_pass">Mot-de-pass</label>
                                <input type="password" name="user_pass" id="user_pass" autocomplete="off">
                            </div>
                            <button type="submit" name="VI" class="btn color-primary-bg mt-3 text-dark">Je m'inscris</button>
                        </form>
                        </section>
                    </div>
        <!-- ! fin Section inscription -->

                <?php
                //on verifie si tout les champs obligatoire du form sont bien remplie
                if(isset($_POST["VC"])){
                    if(isset($_POST["mail"], $_POST["pass"]) && !empty($_POST["mail"]) && !empty($_POST["pass"])
                    ){
                        //on vérifie l'email
                        if(!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
                            die("Email incorrecte");
                        }

                        //on se connecte a la bdd
                        require "_DBconnexion.php";

                        $sql = "SELECT * FROM `user` WHERE `user_mail` = :email";

                        $query = $db->prepare($sql);
                        $query->bindValue(":email", $_POST['mail'], PDO::PARAM_STR);
                        $query->execute();

                        $user = $query->fetch();

                        //pas d'utilisateur
                        if(!$user){
                            die("L'utilisateurs et/ou le mot de passe est incorrect");
                        }
                        // ici user ok on vérifie le mdp
                        if(!password_verify($_POST["pass"], $user["user_pass"])){
                            die("L'utilisateurs et/ou le mot de passe est incorrect");
                        }

                        //ici l'utilisateurs et le mdp sont ok
                        //on va pourvoir connecter l'utilisateur


                        //on stock dans $_SESSION les informations de l'utilisateurs
                        $_SESSION["user"] = [
                            "id" => $user["id"],
                            "nom" => $user["last_name"],
                            "prenom" => $user["first_name"],
                            "mail" => $user["user_mail"],
                            "date" => $user["user_date"]
                        ];

                        //on redirige vers la page de profil
                        header("Location: _profil.php");


                        
                    }else{
                        die("mange tes morts");
                    }
                }
                ?>
        <!-- Section connexion -->
                    <div class="col">
                        <section id="connexion" class="py-5 px-5">
                        <h1 class="font-mont color-primary my-4">Connexion</h1>
                            <form method="post">
                                <div class="d-flex flex-column my-2 fw-bolder font-mont color-second">
                                    <label for="mail">Email</label>
                                    <input type="email" name="mail" id="mail" autocomplete="off">
                                </div>
                                <div class="d-flex flex-column my-2 fw-bolder font-mont color-second">
                                    <label for="pass">Mot-de-pass</label>
                                    <input type="password" name="pass" id="pass" autocomplete="off">
                                </div>
                                <button type="submit" name="VC"  class="btn color-second-bg mt-3 color-primary">Me connecter</button>
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