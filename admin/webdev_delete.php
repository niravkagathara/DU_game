<?php 
require_once 'auth_check.php';
include_once '../classes/Webdevs.php';
$dev = new Webdevs();
$_SESSION['dele']=$dev->deleteById($_GET['id']);
header('Location:webdev.php');
?>