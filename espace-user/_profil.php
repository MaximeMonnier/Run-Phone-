<?php 
    include "./_header-user.php";
    include "./_list-profil-user.php";
?>


                    <div id="affichage" class="col-10" style="background-image: url(../assets/admin-pic/lightbulb-1875247_1920.jpg);">
                        <h1 class="text-light pt-5 ps-5" style="line-height:70px;">Bonjour bienvenue dans<br>votre espace utilisateur</h1>
                        <!-- <p>Profil de <?= $_SESSION["user"]["nom"]?> <?= $_SESSION["user"]["prenom"] ?></p>
                        <p>Nom <?= $_SESSION["user"]["nom"] ?></p>
                        <p>prénom <?= $_SESSION["user"]["prenom"] ?></p>
                        <p>Email <?= $_SESSION["user"]["mail"] ?></p>
                        <h2><a href="./_deconnexion.php">Déconnexion</a></h2> -->
                    </div>
                </div>
            </div>
        </section>
    </main>    
</body>
</html>