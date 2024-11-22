<?php
class Dbconfig {
    private $server='localhost';
    private $username='root';
    private $password='';
    private $database='games';
    public $con;
     function __construct(){
        try{
           $this->con=mysqli_connect($this->server,$this->username,$this->password,$this->database)
            or die("Connection failed: " . mysqli_connect_error());
           
        }catch(Exception $e){
            echo "Connection failed:" . $e->getMessage();
        }

        
    }
}

?>