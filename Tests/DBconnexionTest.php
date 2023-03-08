<?php

require_once 'database/_DBconnexion.php';

use PHPUnit\Framework\TestCase;

class DBconnexionTest extends TestCase {

    public function testDatabaseConnection() {
        //constantes d'environements
        define("DBhost", "localhost");
        define("DBuser", "root");
        define("DBpassword", "");
        define("DBname", "shopee");

        // DSN (data source name) de connexion
        // lecriture dans $dsn est concatainer car j'ai déclarer les variables define avant 
        $dsn = "mysql:dbname=".DBname.";host=".DBhost;

        try{
            // on instancie PDO
            $db = new PDO($dsn, DBuser, DBpassword);
            $db->exec("SET NAMES utf8");
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // Vérifie que la connexion a été établie avec succès
            $this->assertInstanceOf(PDO::class, $db);
        }
        catch (PDOException $e) {
            // En cas d'erreur de connexion, le test échoue
            $this->fail("Erreur de connexion à la base de données: ".$e->getMessage());
        }
    }
}
?>

