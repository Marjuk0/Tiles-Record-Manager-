<?php

    class category{
        public $category;

        public function __construct() {    
            $this->connection = mysqli_connect("localhost", "root", "", "stock")
                or die("Database Connectin Failed");
        }

        public function create($a){
            if($this->connection){
                $conn = $this->connection->prepare("INSERT INTO stock_category (category) VALUES(?)");
                $conn->bind_param("s", $a);
                if($conn->execute()){
                    echo"
                        <h3 style='color: green; text-align:center;'>Product Inserted Succesfully</h3>
                        <div style='width:99%;display:flex;justify-content:center;'>
                            <a href='../index.php' style='background-color: green;color:white;border-radius:5px;padding:9px 15px;text-decoration:none;margin: 1px 9px;'>Back</a>
                        </div>

                    ";
                }else{
                    echo"Product Insert Failed";
                }
            }else{
                echo"Connection not available";
            }
        }


        public function read(){
            if($this->connection){
                $conn = $this->connection->prepare("SELECT * FROM stock_category");
                if($conn->execute()){
                    $result = $conn->get_result();
                    while($row = $result->fetch_assoc()){
                        $id = $row['id'];
                        $category = $row['category'];
                     

                        echo"
                    
                      <tr>
                      <td><h2><b>$category</b></h2></td>
                   
                      <td>
                        <button type='button' class='btn btn-danger'><a href='controllers/category.php?delete_id={$id}'><i class='icofont-ui-delete'></i> </a></button>
                        <button type='button' class='btn btn-success'> <a href='update_category.php?category_id={$id}'><i class='icofont-ui-edit'></i></a></button>
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


        
        public function card(){
            if($this->connection){
                $conn = $this->connection->prepare("SELECT * FROM stock_category");
                if($conn->execute()){
                    $result = $conn->get_result();
                    while($row = $result->fetch_assoc()){
                        $category = $row['category'];
                        $id = $row['id'];
                     

                        echo"
                    
                   

                      <div class='col-6 col-md-3'>
                      <div class='card border-warning  mb-3' style='max-width: 18rem;'>
                        <div class='card-body text-primary'>
                        <h1 class='card-title text-dark'><b>$category</b></h1>
                        <a href='product.php?id={$id}' class='btn btn-warning'>Go Detail</a>  
                        </div>
                      </div>
                    </div>
            


                        ";
                    }
                }else{
                    echo "Operation Failed";
                }
            }else{
                echo"Connection not available";
            } 
        }

        public function Choose(){
            if($this->connection){
                $conn = $this->connection->prepare("SELECT * FROM stock_category");
                if($conn->execute()){
                    $result = $conn->get_result();
                    while($row = $result->fetch_assoc()){
                        $category = $row['category'];
                        $id = $row['id'];
                     

                        echo"
                    
                        <option value={$id}>$category</option>

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
                $conn = $this->connection->prepare("SELECT * FROM stock_category WHERE id = ?");
                $conn->bind_param("i", $id);
                $conn->execute();
                $result = $conn->get_result();
                while($row = $result->fetch_assoc()){
                    $id = $row['id'];
                    $category = $row['category'];
                   
                }

                echo "
                    <h4 class='text-center'>Update Category</h4>
                    <div class='container'>
              
                    <form action='controllers/category.php' method='POST'>
                    <div class='form-group'>
                    <label for='formGroupExampleInput'>category</label>
                    <input type='text' name='updated_category' class='form-control' id='formGroupExampleInput'  value='{$category}'>
                  </div>
                  
                  <input type='hidden' name='id' value='{$id}'>
                  <input type='submit' value='Submit'>
                    </form>
                        <br>
                        <a href='../index.php' style='background-color: green;color:white;border-radius:5px;padding:9px 15px;text-decoration:none;margin: 25px 9px;'>Back</a>
                    
                    </div>
                    
                ";

            }else{
                echo"Connection not available";
            }
        }


        public function update_category($category, $id){
            if($this->connection){
               $conn = $this->connection->prepare("UPDATE stock_category SET category = ? WHERE id = ?");
               $conn->bind_param("si", $category, $id);
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
                $conn = $this->connection->prepare("DELETE FROM stock_category WHERE id = ?");
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