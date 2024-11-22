<?php
require_once 'auth_check.php';

include_once '../classes/Webdevs.php';
$dev = new Webdevs();
if (isset($_POST)) {
    // Adding developer with direct $_POST parameters
print_r($_POST);
$a = $_FILES['webdev_photo']['name'];
if (empty($a) || !isset($_FILES['webdev_photo'])) { // Updated condition to check if $a is empty or file is not set
    $_POST['webdev_photo'] = $_POST['photo']; // Assigning value from $_POST['photo']
} else {        
    $_POST['webdev_photo'] = $a;
    $uploadDir = "../Skyline web/assests/Images/";
    $uploadFile = $uploadDir . $_FILES["webdev_photo"]["name"];

    if (move_uploaded_file($_FILES["webdev_photo"]["tmp_name"], $uploadFile)) {
        echo "File is valid and has been uploaded successfully.";
    } else {
        echo "Error uploading the file.";
    }
}

    $_SESSION['msg'] = $dev->updateDeveloper(
        $_POST['id'],
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
