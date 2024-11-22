<?php
include_once 'Dbconfig.php';
class Feedback extends Dbconfig{

  function getAll(){
    $sql = "SELECT * FROM feedback_table;";
    $result=mysqli_query($this->con,$sql);
    $resArray = array();
    while($row=mysqli_fetch_assoc($result)){
        $resArray[]=$row;
    }
    return $resArray;

  }
  
  function deleteById($id){
    $sql = "DELETE FROM feedback_table WHERE id=$id;";
    mysqli_query($this->con,$sql);
    $resmeassage="feedback Deleted Successfully";
    return $resmeassage;
  }
  // function updateById($id,$name,$enrollment,$password,$sem,$branch){
  //   $sql = "UPDATE students SET name='$name',enrollment='$enrollment',password='$password',sem='$sem',branch='$branch' WHERE id=$id;";
  //   mysqli_query($this->con,$sql);
  //   $resmeassage="Record Updated Successfully";
  //   return $resmeassage;
  // }
  // function addStudent($name,$enrollment,$password,$sem,$branch){
  //   $sql = "INSERT INTO students (name,enrollment,password,sem,branch) VALUES ('$name','$enrollment','$password','$sem','$branch');";
  //   mysqli_query($this->con,$sql);
  //   $resmeassage="Record Added Successfully";
  //   return $resmeassage;
  // }
  
  function addfeedback($player_name, $category, $comment) {
    $sql = "INSERT INTO feedback_table (player_name, category, comment) 
            VALUES ('$player_name', '$category', '$comment');";
    mysqli_query($this->con, $sql);
    $resmeassage = "feedback Added Successfully";
    return $resmeassage;
}


}
?>