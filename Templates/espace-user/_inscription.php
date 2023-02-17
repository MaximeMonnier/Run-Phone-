<?php

//on verifie si tout les champs obligatoire du fom sont bien remplie
if(!empty($_POST)){
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
        require_once "_DBconnexion.php";

        $sql = "INSERT INTO `user`(`last_name`, `first_name`, `user_mail`, `user_pass`, `user_role`, `user_date`) VALUES (:nom, :prenom, :email, '$pass', :user_role, NOW())";

        $query = $db->prepare($sql);

        $query->bindvalue(":nom", $nom, PDO::PARAM_STR); 
        $query->bindvalue(":prenom", $prenom, PDO::PARAM_STR); 
        $query->bindvalue(":email", $_POST['user_mail'], PDO::PARAM_STR); 
        $query->bindvalue(":user_role", '[\"ROLE_USER"\]', PDO::PARAM_STR); 

        $query->execute();

        //on connecte l'utilisateurs



    }else{
        die("Le formulaire n'est pas complet");
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
        href="./style.css">    

    <!-- Font awesome icons -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

</head>

<body>


<h1>Inscription</h1>

<form method="post">
    <div>
        <label for="last_name">Nom</label>
        <input type="text" name="first_name" id="first_name">
    </div>
    <div>
        <label for="first_name">Prénom</label>
        <input type="text" name="last_name" id="last_name">
    </div>
    <div>
        <label for="user_pass">Mot-de-pass</label>
        <input type="password" name="user_pass" id="user_pass">
    </div>
    <div>
        <label for="user_mail">e-mail</label>
        <input type="email" name="user_mail" id="user_mail">
    </div>
    <button type="submit">Je m'inscris</button>
</form>
    
</body>
</html>