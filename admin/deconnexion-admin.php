<?php
session_start();
//unset surpprime une variable
unset($_SESSION["admin"]);

header("Location: ./connexion.php");
?>
