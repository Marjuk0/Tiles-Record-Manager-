<?php

    class product_details{
        public $date;
        public $product_id;
        public $m_in;
        public $q_in;
        public $m_out;
        public $q_out;
        public $remarks;
        public $product_name;

    

        public function __construct() {    
            $this->connection = mysqli_connect("localhost", "root", "", "stock")
                or die("Database Connectin Failed");
        }

        public function create($a, $b, $c, $d, $e, $f, $g, $h, $id ){
            if($this->connection){
                $conn = $this->connection->prepare("INSERT INTO product_details (date, product_id, m_in, q_in, m_out, q_out, remarks, product_name ) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                $conn->bind_param("ssssssss", $a, $b, $c, $d, $e, $f, $g, $h);
                if($conn->execute()){

                    header('Location: ../product_detail.php?id='.$id);

                }else{
                    echo"Product Insert Failed";
                }
            }else{
                echo"Connection not available";
            }
        }



        public function table_display($id){
            if($this->connection){
                $conn = $this->connection->prepare("SELECT * FROM product_details WHERE product_id = ? ORDER BY id DESC" );
                $conn->bind_param("i", $id);
                if($conn->execute()){
                    $result = $conn->get_result();
                    while($row = $result->fetch_assoc()){
                        $date = $row['date'];
                        $m_in = $row['m_in'];
                        $q_in = $row['q_in'];
                        $m_out = $row['m_out'];
                        $q_out = $row['q_out'];
                        $remarks = $row['remarks'];
                        $id = $row['id'];
                     
                        if($q_in == ''){
                           $q_in = 0;
                        }

                        if($q_out == ''){
                           $q_out = 0;
                        }
                        echo"

                    <tr>
                        <td>$date</td>
                        <td>$m_in</td>
                        <td class='quantity_in'>$q_in</td>
                        <td>$m_out</td>
                        <td class='quantity_out' >$q_out</td>
                        <td>$remarks</td>
                
                        <td>
                          <button type='button' class='btn btn-danger'><a href='controllers/product_details.php?delete_id={$id}'><i class='icofont-ui-delete'></i></button>
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


        public function table_1(){
            if($this->connection){
                $conn = $this->connection->prepare("SELECT * FROM product_details ORDER BY id DESC" );
                if($conn->execute()){
                    $result = $conn->get_result();
                    while($row = $result->fetch_assoc()){
                        $product_name = $row['product_name'];
                        $date = $row['date'];
                        $m_in = $row['m_in'];
                        $q_in = $row['q_in'];
                        $m_out = $row['m_out'];
                        $q_out = $row['q_out'];
                        $remarks = $row['remarks'];
                        $id = $row['id'];
                     

                        echo"

                    <tr>
                        <td>$product_name</td>
                        <td>$date</td>
                        <td>$m_in</td>
                        <td id='quentity_in'>$q_in.00</td>
                        <td>$m_out</td>
                        <td id='quentity_out' >$q_out.00</td>
                        <td>$remarks</td>
                        <td>
                        <button type='button' class='btn btn-danger'><a href='controllers/product_details.php?delete_id={$id}'><i class='icofont-ui-delete'></i></button>
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




        public function delete($id){
            if($this->connection){
                $conn = $this->connection->prepare("DELETE FROM product_details WHERE id = ?");
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