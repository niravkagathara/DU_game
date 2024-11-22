<?php 
require_once 'auth_check.php';
 
include_once '../classes/Webdevs.php';
$dev = new Webdevs();
if(isset($_POST)){
// Adding developer with direct $_POST parameters
// print_r($_POST);
$uploadDir = "../Skyline web/assests/Images/";
$uploadFile = $uploadDir . $_FILES["webdev_photo"]["name"];
    
        if (move_uploaded_file($_FILES["webdev_photo"]["tmp_name"], $uploadFile)) {
            echo "File is valid and has been uploaded successfully.";
        } else {
            echo "Error uploading the file.";
        }

        $_POST['status']='inactive';
$_POST['webdev_photo']=$_FILES['webdev_photo']['name'];
$_SESSION['msg']= $dev->addDeveloper(
    $_POST['webdev_name'], 
    $_POST['degree'], 
    $_POST['branch'], 
    $_POST['sem'], 
    $_POST['email_address'], 
    $_POST['phone_no'], 
    $_POST['webdev_photo'], 
    $_POST['linkdin_url'],
    $_POST['webdev_role'],
    $_POST['status'],
    
    
); // Adding developer
// print_r($_POST); // Printing all POST data
header('Location: webdev.php');
}
?>