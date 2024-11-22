<?php
include_once 'Dbconfig.php';
class Webdevs extends Dbconfig{

  function getAll(){
    $sql = "SELECT * FROM web_developer_table;";
    $result=mysqli_query($this->con,$sql);
    $resArray = array();
    while($row=mysqli_fetch_assoc($result)){
        $resArray[]=$row;
    }
    return $resArray;
    // echo json_encode($resArray); // JSON में डेटा लौटाएं

  }
  function getById($id){
    $sql = "SELECT * FROM web_developer_table WHERE webdev_id=$id;";
    $result=mysqli_query($this->con,$sql);
    $resArray=mysqli_fetch_assoc($result);
    return $resArray;
  }
  function deleteById($id){
    $sql = "DELETE FROM web_developer_table WHERE webdev_id=$id;";
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

  function addDeveloper($webdev_name, $degree, $branch, $sem, $email_address, $phone_no, $webdev_photo, $linkdin_url, $webdev_role,$status) {
    $sql = "INSERT INTO web_developer_table (webdev_name, degree, branch, sem, email_address, phone_no, webdev_photo, linkdin_url, webdev_role,status) 
            VALUES ('$webdev_name', '$degree', '$branch', '$sem', '$email_address', '$phone_no', '$webdev_photo', '$linkdin_url', '$webdev_role','$status');";
    mysqli_query($this->con, $sql);
    $resmessage = "Developer Added Successfully";
    return $resmessage;
}
function updateDeveloper($id, $webdev_name, $degree, $branch, $sem, $email_address, $phone_no, $webdev_photo, $linkdin_url, $webdev_role,$status) {
  $sql = "UPDATE web_developer_table 
          SET webdev_name='$webdev_name', degree='$degree', branch='$branch', sem='$sem', email_address='$email_address', phone_no='$phone_no', webdev_photo='$webdev_photo', linkdin_url='$linkdin_url', webdev_role='$webdev_role',status='$status' 
          WHERE webdev_id=$id;";
  mysqli_query($this->con, $sql);
  $resmessage = "Developer Updated Successfully";
  return $resmessage;
}

}
?>