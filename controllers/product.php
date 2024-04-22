<?php
require_once ("../models/product.php");

// Receiving Form Data
if(isset($_POST['product_name'])){
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $cp = $_POST['cp'];
   
  
    $data = new stock_product();
    $data->create($product_name, $category_id, $cp);

}


if(isset($_POST['updated_product'])){
    $product_name = $_POST['updated_product'];
    $cp = $_POST['cp'];
    $id = $_POST['id'];

    $data = new stock_product();
    $data->update_product($product_name, $cp, $id);
    
}



if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $data = new stock_product();
    $data->delete($id);
}


?>