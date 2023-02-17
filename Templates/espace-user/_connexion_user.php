<?php

//on verifie si tout les champs obligatoire du fom sont bien remplie
if(!empty($_POST)){
    if(isset($_POST['user_mail'], $_POST['user_pass']) && !empty($_POST['user-mail']) && !empty($_POST['user-pass'])
    ){
        //on vérifie l'email
        if(!filter_var($_POST['user_mail'], FILTER_VALIDATE_EMAIL)){
            die("cen'est pas un Email");
        }

        //on se connecte a la bdd
        require_once "_DBconnexion.php";

        $sql = "SELECT * FROM `users` WHERE `email` = :email";

        $query = $db->prepare($sql);
        $query->bindValue(":email", $POST['email'], PDO::PARAM_STR);
        $query->execute();

        $user = $query->fetch();

        var_dump($user);die;
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
        <label for="user_mail">Email</label>
        <input type="email" name="user_mail" id="user_mail">
    </div>
    <div>
        <label for="user_pass">Mot-de-pass</label>
        <input type="password" name="user_pass" id="user_pass">
    </div>
    <button type="submit">Me connecter</button>
</form>
    
</body>
</html>