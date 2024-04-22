<?php
require_once("../models/category.php");

// Receiving Form Data
if(isset($_POST['category'])){
    $category = $_POST['category'];
   
  
    $data = new category();
    $data->create($category);
}


if(isset($_POST['updated_category'])){
    $category = $_POST['updated_category'];
    $id = $_POST['id'];

    $data = new category();
    $data->update_category($category, $id);
    
}


if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $data = new category();
    $data->delete($id);
}


?>