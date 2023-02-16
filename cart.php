<?php
ob_start();
    //include header php file 
    include "header.php";
?>

<?php

    /* include cart item if it's not empty*/ 
    count($product->getData('cart')) ? include "Templates/_cart-template.php":include "Templates/notFound/_cart_notFound.php";
    /* ! include cart item if it's not empty*/ 

    /* include whishliste*/ 
    count($product->getData('wishlist')) ? include "Templates/_wishlist_template.php":include "Templates/notFound/_wishlist_notFound.php";
    /* include wishliste*/ 

    /* include new-phones section*/ 
    include "Templates/_new-phones.php";
    /* include new-phones section*/ 
?>

<?php
    //include footer php file 
    include "footer.php";
?>