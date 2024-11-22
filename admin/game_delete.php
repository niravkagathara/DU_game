<?php 

require_once 'auth_check.php';

include_once "../classes/Games.php";
$ge = new Games_a();
$g=$ge->getById($_GET['id']);

$a = substr($g['play_url'], 0, -11); 

deleteFolder('../all_games/'.$a);
// deleteFolder('../Skyline web/Zip/'.$a.'.zip');
zipdelete('../Skyline web/Zip/'.$a.'.zip');
$_SESSION['dele']= $ge->deleteById($_GET['id']);

// $path='../all_games/'.$g['play_url'];
function deleteFolder($folderPath) {
    // फ़ोल्डर में सभी फ़ाइलों को हटाएं
    if (is_dir($folderPath)) {
        $files = array_diff(scandir($folderPath), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$folderPath/$file")) ? deleteFolder("$folderPath/$file") : unlink("$folderPath/$file");
        }
        rmdir($folderPath); // फ़ोल्डर को हटाएं
    }
}
function zipdelete($zipFilePath){
    if (file_exists($zipFilePath)) {
        if (unlink($zipFilePath)) {
            echo "Zip file successfully deleted: $zipFilePath <br>";
        } else {
            echo "Failed to delete zip file: $zipFilePath <br>";
        }
    } else {
        echo "Zip file does not exist: $zipFilePath <br>";
    }
}

header('Location:games.php');
?>