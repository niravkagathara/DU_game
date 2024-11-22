<?php
include_once 'Dbconfig.php';
class GamesDev extends Dbconfig{

  function getAll(){
    $sql = "SELECT * FROM game_developer_table;";
    $result=mysqli_query($this->con,$sql);
    $resArray = array();
    while($row=mysqli_fetch_assoc($result)){
        $resArray[]=$row;
    }
    return $resArray;
    // echo json_encode($resArray); // JSON में डेटा लौटाएं

  }
  function getById($id){
    $sql = "SELECT * FROM game_developer_table WHERE gamedev_id=$id;";
    $result=mysqli_query($this->con,$sql);
    $resArray=mysqli_fetch_assoc($result);
    return $resArray;
  }
  function deleteById($id){
    // पहले संबंधित गेम्स को हटाएं
    $sqlDeleteGames = "DELETE FROM games_table WHERE gamedev_id=$id;";
    mysqli_query($this->con, $sqlDeleteGames);
    
    // फिर गेम डेवलपर को हटाएं
    $sql = "DELETE FROM game_developer_table WHERE gamedev_id=$id;";
    mysqli_query($this->con, $sql);
    $resmeassage = "game and developer both Deleted Successfully";
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

  function addDeveloper($dev_name, $degree, $branch, $sem, $email_address, $phone_no, $dev_photo, $linkdin_url,$status) {
      $sql = "INSERT INTO game_developer_table (dev_name, degree, branch, sem, email_address, phone_no, dev_photo, linkdin_url,status) 
              VALUES ('$dev_name', '$degree', '$branch', '$sem', '$email_address', '$phone_no', '$dev_photo', '$linkdin_url','$status');";
      mysqli_query($this->con, $sql);
      $resmeassage = "Developer Added Successfully";
      return $resmeassage;
  }

  function updateDeveloper($id, $dev_name, $degree, $branch, $sem, $email_address, $phone_no, $dev_photo, $linkdin_url,$status) {
      $sql = "UPDATE game_developer_table SET dev_name='$dev_name', degree='$degree', branch='$branch', sem='$sem', 
              email_address='$email_address', phone_no='$phone_no', dev_photo='$dev_photo', linkdin_url='$linkdin_url' ,status='$status'
              WHERE gamedev_id=$id;";
      mysqli_query($this->con, $sql);
      $resmeassage = "Developer Updated Successfully";
      return $resmeassage;
  }

}
?>