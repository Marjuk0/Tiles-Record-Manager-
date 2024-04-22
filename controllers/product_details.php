<?php
require_once("../models/product_details.php");

// Receiving Form Data
if(isset($_POST['date'])){
    $date = $_POST['date'];
    $product_id = $_POST['product_id'];
    $m_in = $_POST['m_in'];
    $q_in = $_POST['q_in'];
    $m_out = $_POST['m_out'];
    $q_out = $_POST['q_out'];
    $remarks = $_POST['remarks'];
    $product_name = $_POST['product_name'];
   $product_id = $_POST['product_id'];

   
  
    $data = new product_details();
    $data->create($date, $product_id, $m_in, $q_in, $m_out, $q_out, $remarks, $product_name, $product_id);
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $data = new product_details();
    $data->delete($id);
}

?>
