<?php

//php cart class

class Cart 
{
    public $db = null;

    public function __construct(PDO $db) 
    {
        if(!isset($db)) return null;
        $this->db=$db;
    }

    //insert into cart table

    public function insertintoCart($params =null, $table ="cart"){
        if($this->db != null){
            if($params != null){
                //insert into cart (user_id) values (0)
                // get table columns
                $columns = implode(',',array_keys($params));
                $values = implode(',',array_values($params));

                //create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table,$columns,$values);

                // prepare and execute query
                $stmt = $this->db->prepare($query_string);
                $stmt->execute();
                return $stmt->rowCount();
            }
        }
    }

    //to get user_id and item_id and inside into table
    public function addToCart($userid,$itemid){
        if(isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            //insert data into Cart
            $result = $this->insertintoCart($params);
            if($result){
                //reload page
                header("Location:".$_SERVER["PHP_SELF"]);
            }
        }
    }

    //  delete cart item using cart item id
    public function deleteCart($item_id = null, $table ='cart'){
        if($item_id !=null){
            $query_string = "DELETE FROM {$table} WHERE item_id = :item_id";
            // prepare and execute query
            $stmt = $this->db->prepare($query_string);
            $stmt->bindValue(':item_id', $item_id, PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $stmt->rowCount();
        }
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f',$sum);
        }
    }

    // get item_id on shopping cart list
    public function getCartId($cartArray =null, $key = "item_id"){
        if($cartArray != null){
            $cart_id = array_map(function($value) use ($key){
                return $value[$key];
            },$cartArray);
            return $cart_id;
        }
    }

      // Save for later
      public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id=:item_id;";
            $query .= "DELETE FROM {$fromTable} WHERE item_id=:item_id;";

            // prepare and execute multiple queries
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':item_id', $item_id, PDO::PARAM_INT);
            $result = $stmt->execute();

            if($result){
                header("Location : ./cart.php");
            }
            return $result;
        }
    }


}
