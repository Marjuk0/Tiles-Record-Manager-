<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class auth{

    public function __construct() {    
        $this->connection = mysqli_connect("localhost", "root", "", "stock")
            or die("Database Connectin Failed");
    }

    public function register_user($name, $password){
        if($this->connection){
            $hash_pass = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
            $conn = $this->connection->prepare("INSERT INTO admin (name, password) VALUES(?, ?)");
            $conn->bind_param("ss", $name, $hash_pass);
            if($conn->execute()){
                $_SESSION['user_authenticated'] = 1018;
                return "SUCCESS";
            }else{
                return "FAILED";
            }
        }else{
            echo "ERROR_CONNECTION";
        }
    }

    public function login_user($name, $password){
        if($this->connection){
            $conn = $this->connection->prepare("SELECT * FROM admin WHERE name = ?");
            $conn->bind_param("s", $name);
            $conn->execute();
            $result = $conn->get_result();
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if(password_verify($password, $row["password"])){
                    $_SESSION['user_authenticated'] = 1018;
                    return "SUCCESS";
                }else{
                    return "INCORRECT_PASS";
                }
            }else{
                return "NOT_EXIST";
            }
        }else{
            echo "ERROR_CONNECTION";
        }
    }

}