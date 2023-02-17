<?php
session_start();
//unset surpprime une variable
unset($_SESSION["user"]);

header("Location: _connexion-user.php");

?>