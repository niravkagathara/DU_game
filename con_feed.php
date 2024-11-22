<?php 
 
include_once './classes/Feedback.php';
$dev = new Feedback();
if(isset($_POST)){
// Adding developer with direct $_POST parameters
// print_r($_POST);
$_SESSION['msg']= $dev->addfeedback(
    $_POST['player_name'], 
    $_POST['category'], 
    $_POST['comment']
); // Adding developer
// print_r($_POST); // Printing all POST data
header('Location: index.php');
}
?>