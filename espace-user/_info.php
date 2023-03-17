<?php   
    include "./_header-user.php";
    include "./_list-profil-user.php";
?>


                    <div id="affichage" class="col-10 color-yellow-bg">
                    <div class="card mt-3" style="width: 50%;">
                        <div class="card-body">
                        <h3 class="card-title color-second font-robo">Bonjour bienvenue dans votre espace utilisateur</h3>
                        <br>
                        <h4 class="font-robo color-primary">Détails de votre profil :</h4>
                            <p class="card-text">Numéro : <?= $_SESSION["user"]['id'] ?></p>
                            <p class="card-text">Nom : <?= $_SESSION["user"]["nom"] ?></p>
                            <p class="card-text">Prénom : <?= $_SESSION["user"]["prenom"] ?></p>
                            <p class="card-text">Email : <?= $_SESSION["user"]["mail"] ?></p>
                            <p class="card-text">Inscris depuis le : <?= $_SESSION["user"]["date"] ?></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>    
</body>
</html>