<?php
include_once 'Dbconfig.php';
class Games_a extends Dbconfig{

  function getAll(){
    $sql = "SELECT * FROM games_table;";
    $result=mysqli_query($this->con,$sql);
    $resArray = array();
    while($row=mysqli_fetch_assoc($result)){
        $resArray[]=$row;
    }
    return $resArray;
    // echo json_encode($resArray); // JSON में डेटा लौटाएं

  }
  function getById($id){
    $sql = "SELECT * FROM games_table WHERE game_id=$id;";
    $result=mysqli_query($this->con,$sql);
    $resArray=mysqli_fetch_assoc($result);
    return $resArray;
  }
  function deleteById($id){
    $sql = "DELETE FROM games_table WHERE game_id=$id;";
    mysqli_query($this->con,$sql);
    $resmeassage="Record Deleted Successfully";
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
  
  function addGame($gamedev_id, $game_name, $game_img, $play_url, $platform, $verification_status,$game_status) {
    $sql = "INSERT INTO games_table (gamedev_id, game_name, game_img, play_url, platform, verification_status,game_status) 
            VALUES ($gamedev_id, '$game_name', '$game_img', '$play_url', '$platform', '$verification_status','$game_status');";
    mysqli_query($this->con, $sql);
    $resmeassage = "Game Added Successfully";
    return $resmeassage;
}

function updateGame($id, $gamedev_id, $game_name, $game_img, $play_url, $platform, $verification_status,$game_status) {
    $sql = "UPDATE games_table SET gamedev_id=$gamedev_id, game_name='$game_name', game_img='$game_img', 
            play_url='$play_url', platform='$platform', verification_status='$verification_status',game_status='$game_status' 
            WHERE game_id=$id;";
    mysqli_query($this->con, $sql);
    $resmeassage = "Game Updated Successfully";
    return $resmeassage;
}

}
?>