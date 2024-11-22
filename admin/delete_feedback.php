<?php 

require_once 'auth_check.php';

include_once '../classes/Feedback.php';
$dev=new Feedback();
$_SESSION['dele']= $dev->deleteById($_GET['id']);

header('Location:feedback.php');
?>