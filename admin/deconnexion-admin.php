<?php
session_start();
//unset surpprime une variable
unset($_SESSION["mdp"]);

header("Location: ./connexion.php");

?>