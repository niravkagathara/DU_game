<?php 

require_once 'auth_check.php';

include_once '../classes/Games.php';
$dev = new Games_a();
if (isset($_POST)) {

    $b=$_FILES['play_url'];
    if (empty($b) || !isset($_FILES['play_url'])) { // Updated condition to check if $a is empty or file is not set
        $_POST['play_url'] = $_POST['url']; // Assigning value from $_POST['photo']
    }
    else{
        $zipFile = $_FILES['play_url'];
        // Check if the file is a ZIP file
        $fileType = pathinfo($zipFile['name'], PATHINFO_EXTENSION);
        if (strtolower($fileType) !== 'zip') {
            echo "Only ZIP files are allowed.";
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
        $w = substr($zipFile['name'], 0, -4); 
        $_POST['play_url']=''.$w.'/index.html';

    }
   
    $a = $_FILES['game_img']['name'];
if (empty($a) || !isset($_FILES['game_img'])) { // Updated condition to check if $a is empty or file is not set
    $_POST['game_img'] = $_POST['photo']; // Assigning value from $_POST['photo']
} else {        
    $_POST['game_img'] = $a;
    $uploadDir = "../Skyline web/assests/Images/";
    $uploadFile = $uploadDir . $_FILES["game_img"]["name"];

    if (move_uploaded_file($_FILES["game_img"]["tmp_name"], $uploadFile)) {
        echo "File is valid and has been uploaded successfully.";
    } else {
        echo "Error uploading the file.";
    }
}

    $_SESSION['msg'] = $dev->updateGame(
        $_POST['id'],
        $_POST['gamedev_id'],
        $_POST['game_name'],
        $_POST['game_img'],
        $_POST['play_url'],
        $_POST['platform'],
        $_POST['verification_status'],
        $_POST['game_status'],
        
    ); // Adding developer
    // print_r($_POST); // Printing all POST data
    header('Location: games.php');
}
