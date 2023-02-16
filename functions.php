<?php
 //require MySQL Connection
 require 'database/DBControler.php';

  //require Product Class
  require 'database/Product.php';

  //require Cart Class
  require 'database/Cart.php';


 //DBController object
 $db = new DBController();

 //product object

 $product = new Product($db);
 $product_shuffle = $product->getData();

  //cart object
 $Cart = new Cart($db);

