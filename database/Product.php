<?php
//Use to fetch product data
class Product
{
    public $db = null;
    public function __construct(PDO $db)
    {
        if(!$db) return null;
        $this->db = $db;
    }
    //fetch product data using getdata methode
    public function getData($table ='product'){
        $result = $this->db->query("SELECT*FROM {$table}");
        $resultArray = array();
        //fetch product data one by one
        while ($item = $result->fetch(PDO::FETCH_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

     // get product using item id
     public function getProduct($item_id = null, $table= 'product'){
        if (isset($item_id)){
            $result = $this->db->query("SELECT * FROM {$table} WHERE item_id={$item_id}");
            $resultArray = array();

            // fetch product data one by one
            while ($item = $result->fetch(PDO::FETCH_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }
}