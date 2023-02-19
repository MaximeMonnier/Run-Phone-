<?php
session_start();
//unset surpprime une variable
unset($_SESSION["user"]);

header("Location: _IC-user.php");

?>