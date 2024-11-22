<?php 
require_once 'auth_check.php';

include_once "../classes/Games.php";
$ge = new Games_a();
$game = $ge->getAll();
include_once '../classes/Gamedevs.php';
$dev = new GamesDev();
$d=$dev->getAll();

if(isset($_POST)){
    
    
    $zipFile = $_FILES['play_url'];

    // Check if the file is a ZIP file
    $fileType = pathinfo($zipFile['name'], PATHINFO_EXTENSION);
    if (strtolower($fileType) !== 'zip') {
        die("Only ZIP files are allowed.");
    }

    // Set the destination path where the file will be saved
    $uploadDir1 = '../Skyline web/Zip/';
    $zipFilePath = $uploadDir1 . basename($zipFile['name']);

    // Move the uploaded file to the server directory
    if (move_uploaded_file($zipFile['tmp_name'], $zipFilePath)) {
        echo "ZIP file uploaded successfully.<br>";

        // Extract the ZIP file
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath) === TRUE) {
            $extractPath = '../all_games/';
            $zip->extractTo($extractPath);
            $zip->close();
            echo "ZIP file extracted to '$extractPath' successfully.";
        } else {
            echo "Failed to open ZIP file.";
        }
    } else {
        echo "Failed to upload ZIP file.";
    }


$uploadDir = "../Skyline web/assests/Images/";
$uploadFile = $uploadDir . $_FILES["game_img"]["name"];
    
        if (move_uploaded_file($_FILES["game_img"]["tmp_name"], $uploadFile)) {
            echo "File is valid and has been uploaded successfully.";
        } else {
            echo "Error uploading the file.";
        }
        $a = substr($zipFile['name'], 0, -4); 
        $_POST['play_url']=''.$a.'/index.html';
    // $_POST['play_url']=$_FILES['play_url']['name'];
    $_POST['game_img']=$_FILES['game_img']['name'];
    $_POST['verification_status']='pending';
    $_POST['game_status']='inactive';
    $_SESSION['msg']= $ge->addGame(
        $_POST['gamedev_id'], 
        $_POST['game_name'], 
        $_POST['game_img'], 
        $_POST['play_url'], 
        $_POST['platform'], 
        $_POST['verification_status'], 
        $_POST['game_status']
    ); // Adding developer
    // print_r($_POST); // Printing all POST data
    header('Location: games.php');
}
?>