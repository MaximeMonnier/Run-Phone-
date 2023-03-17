<?php
//constantes d'environements
define("DBhost", "localhost");
define("DBuser", "root");
define("DBpassword", "");
define("DBname", "shopee");
// DSN (data source name) de connexion
// lecriture dans $dsn est concatainer car j'ai déclarer les variables define avant 
$dsn = "mysql:dbname=".DBname.";host=".DBhost;
//connexion a la bdd
try{
    // on instancie PDO
    $db = new PDO($dsn, DBuser, DBpassword);
    // echo "Vous etes bien connecter a la Base de donnée";
    //on s'assure d'envoyer les donne en utf-8
    $db->exec("SET NAMES utf8");  
    // on definit le mode de "fetch" par default
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
    die("Erreur:".$e->getMessage());
}
?>
