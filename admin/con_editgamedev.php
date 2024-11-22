<?php
require_once 'auth_check.php';

include_once '../classes/Gamedevs.php';
$dev = new GamesDev();
if (isset($_POST)) {
    // Adding developer with direct $_POST parameters
print_r($_POST);
$a = $_FILES['dev_photo']['name'];
if (empty($a) || !isset($_FILES['dev_photo'])) { // Updated condition to check if $a is empty or file is not set
    $_POST['dev_photo'] = $_POST['photo']; // Assigning value from $_POST['photo']
} else {        
    $_POST['dev_photo'] = $a;
    $uploadDir = "../Skyline web/assests/Images/";
    $uploadFile = $uploadDir . $_FILES["dev_photo"]["name"];

    if (move_uploaded_file($_FILES["dev_photo"]["tmp_name"], $uploadFile)) {
        echo "File is valid and has been uploaded successfully.";
    } else {
        echo "Error uploading the file.";
    }
}

    $_SESSION['msg'] = $dev->updateDeveloper(
        $_POST['id'],
        $_POST['dev_name'],
        $_POST['degree'],
        $_POST['branch'],
        $_POST['sem'],
        $_POST['email_address'],
        $_POST['phone_no'],
        $_POST['dev_photo'],
        $_POST['linkdin_url'],
        $_POST['status']
    ); // Adding developer
    // print_r($_POST); // Printing all POST data
    header('Location: index.php');
}
