<?php

    class stock_product{
        public $product_name;
        public $category_id;
        public $cp;
    


        public function __construct() {    
            $this->connection = mysqli_connect("localhost", "root", "", "stock") 
                or die("Database Connectin Failed");
        }

        public function create($a, $b, $c ){
            if($this->connection){
                $conn = $this->connection->prepare("INSERT INTO stock_product (product_name, category_id, cp) VALUES(?, ?, ?)");
                $conn->bind_param("sis", $a, $b, $c);
                if($conn->execute()){

                    header('Location: ../index.php');

                }else{
                    echo"Product Insert Failed";
                }
            }else{
                echo"Connection not available";
            }
        }

      public function product_list($id){
            if($this->connection){
                $conn = $this->connection->prepare("SELECT * FROM stock_product WHERE category_id=?");
                $conn->bind_param("i", $id);
                if($conn->execute()){
                    $result = $conn->get_result();
                    while($row = $result->fetch_assoc()){
                        $id = $row['id'];
                        $product_name = $row['product_name'];
                     

                        echo"
                    
                      <tr>
                      <td><h4><b>$product_name</b></h4></td>
                   
                      <td>
                      <button type='button' class='btn btn-success btn-block'> <a href='product_detail.php?id={$id}'>Details</a></button>
                        </td>
                    </tr>

                        ";
                    }
                }else{
                    echo "Operation Failed";
                }
            }else{
                echo"Connection not available";
            } 
        }

        public function product_edit(){
            if($this->connection){
                $conn = $this->connection->prepare("SELECT * FROM stock_product");
                if($conn->execute()){
                    $result = $conn->get_result();
                    while($row = $result->fetch_assoc()){
                        $id = $row['id'];
                        $product_name = $row['product_name'];
                     

                        echo"
                    
                      <tr>
                      <td><h4><b>$product_name</b></h4></td>
                   
                      <td>
                        <button type='button' class='btn btn-danger'><a href='controllers/product.php?delete_id={$id}'><i class='icofont-ui-delete'></i> </a></button>
                        <button type='button' class='btn btn-success'> <a href='update_product.php?update_product={$id}'><i class='icofont-ui-edit'></i></a></button>
                        </td>
                    </tr>

                        ";
                    }
                }else{
                    echo "Operation Failed";
                }
            }else{
                echo"Connection not available";
            } 
        }




       public function Choose($id){
            if($this->connection){
                $conn = $this->connection->prepare("SELECT * FROM stock_product WHERE id = ?");
                $conn->bind_param("i", $id);
                if($conn->execute()){
                    $result = $conn->get_result();
                    while($row = $result->fetch_assoc()){
                        $id = $row['id'];
                        $product_name = $row['product_name'];
                      
                     

                        echo"
                    
                        <option value={$id}>$product_name</option>

                        ";
                    }
                }else{
                    echo "Operation Failed";
                }
            }else{
                echo"Connection not available";
            } 
        }

        public function product_name($id){
            if($this->connection){
                $conn = $this->connection->prepare("SELECT * FROM stock_product WHERE id = ?");
                $conn->bind_param("i", $id);
                if($conn->execute()){
                    $result = $conn->get_result();
                    while($row = $result->fetch_assoc()){
                        
                        $product_name = $row['product_name'];
                      
        
                        echo"
                        $product_name
                        ";
                    }
                }else{
                    echo "Operation Failed";
                }
            }else{
                echo"Connection not available";
            } 
        }


        

       public function cp($id){
        if($this->connection){
            $conn = $this->connection->prepare("SELECT * FROM stock_product WHERE id = ?");
            $conn->bind_param("i", $id);
            if($conn->execute()){
                $result = $conn->get_result();
                while($row = $result->fetch_assoc()){
                    $id = $row['id'];
                    $cp = $row['cp'];
                  
                 

                    echo"
                
                    $cp

                    ";
                }
            }else{
                echo "Operation Failed";
            }
        }else{
            echo"Connection not available";
        } 
    }


        

        public function get_single_category($id){
            if($this->connection){
                $conn = $this->connection->prepare("SELECT * FROM stock_product WHERE id = ?");
                $conn->bind_param("i", $id);
                $conn->execute();
                $result = $conn->get_result();
                while($row = $result->fetch_assoc()){
                    $id = $row['id'];
                    $product_name = $row['product_name'];
                    $cp = $row['cp'];
                   
                }

                echo "
                    <h4 class='text-center'>Update Product</h4>
                    <div class='modal-body bg'>
        <div class='container'>
          <form action='controllers/product.php' method='POST'>
            <div class='form-group'>
              <label for='exampleFormControlInput1'>Name</label>
              <input type='text' name='updated_product' class='form-control' id='exampleFormControlInput1'  value='{$product_name}'>
            </div>
            <div class='form-group'>
            <label for='exampleFormControlInput1'>cp</label>
            <input type='text' name='cp' class='form-control' id='exampleFormControlInput1'  value='{$cp}'>
          </div>

            <input type='hidden' name='id' value='{$id}'>
          
            <input type='submit' value='Submit'>

          </form>
           
        </div>
      </div>
                    
                ";

            }else{
                echo"Connection not available";
            }
        }




        public function update_product($product_name, $cp, $id){
            if($this->connection){
               $conn = $this->connection->prepare("UPDATE stock_product SET product_name = ?, cp = ? WHERE id = ?");
               $conn->bind_param("ssi", $product_name, $cp, $id);
                if($conn->execute()){
                    header('Location: ../index.php');
                }else{
                    echo"Update Failed";
                }
            }else{
                echo"Connection not available";
            }
        }



        

          
        public function delete($id){
            if($this->connection){
                $conn = $this->connection->prepare("DELETE FROM stock_product WHERE id = ?");
                $conn->bind_param("i", $id);
                if($conn->execute()){
                    header('Location: ../index.php');
                }else{
                    echo"Delete Failed";
                }
            }else{
                echo"Connection not available";
            }
        }


    }

?>