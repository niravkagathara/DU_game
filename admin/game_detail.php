<?php
require_once 'auth_check.php';

include_once "../classes/Games.php";
$ge = new Games_a();
$game = $ge->getById($_GET['id']);
include_once '../classes/Gamedevs.php';
$d = new GamesDev();
$g = $d->getById($game['gamedev_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Games</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <?php require_once 'header.php'; ?>
    <!-- ======= Sidebar ======= -->
    <?php require_once 'sidebar.php'; ?>


    <main id="main" class="main">
        <div class="row">
        <h3>games details</h3>
        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <a href="javascript:history.back()" class="btn btn-secondary mb-3">Back</a> 

            <img src="../Skyline web/assests/Images/<?php echo $game['game_img']; ?>" class="card-img-top" alt="..." style="height: 250px; width: 250px; object-fit: cover;">
    
            <h5 class="card-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $game['game_name']; ?></h5>
                <strong>developer name:</strong>
                <p class="card-text"><?php
                                        echo $g['dev_name']; ?></p>
                <strong>Platform:</strong>
                <p class="card-text"><?php echo $game['platform']; ?></p>
                <strong>verification_status:</strong>
                <div>
                    <?php if ($game['verification_status'] == 'pending'): ?>
                        <button class="btn btn-danger"><?php echo $game['verification_status']; ?></button>
                    <?php elseif ($game['verification_status'] == 'verify'): ?>
                        <button class="btn btn-success"><?php echo $game['verification_status']; ?></button>
                    <?php endif; ?>
                </div>

                <strong>status:</strong>
                <div>
                    <?php if ($game['game_status'] == 'inactive'): ?>
                        <button class="btn btn-danger"><?php echo $game['game_status']; ?></button>
                    <?php elseif ($game['game_status'] == 'active'): ?>
                        <button class="btn btn-success"><?php echo $game['game_status']; ?></button>
                    <?php endif; ?>
                </div>
                <br>
                <p class="card-text"><a href="<?php echo '../all_games/'.$game['play_url']; ?>" class="btn btn-primary">game url</a></p>
                <!-- <img src="../Skyline web/assests/Images/<?php echo $g['dev_photo']; ?>" alt="Profile" class="rounded-circle" width="150" height="150"> -->
                <!-- <h2 class="card-title"   ><?php echo $g['dev_name']; ?></h2> -->
                <!-- <p class="card-text"><?php echo $g['webdev_role']; ?></p> -->
                
                <!-- <p class="card-text"><a href="<?php echo $g['linkdin_url']; ?>" class="btn btn-primary">LinkedIn profile</a></p> -->

            </div>
        </div>
        </div>
        <div class="row">
        <h3>developer details</h3>

        <div class="card">
            
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="../Skyline web/assests/Images/<?php echo $g['dev_photo']; ?>" alt="Profile" class="rounded-circle" width="150" height="150">
                <h2 class="card-title"><?php echo $g['dev_name']; ?></h2>
                <!-- <p class="card-text"><?php echo $g['webdev_role']; ?></p> -->
                <p class="card-text"><a href="<?php echo $g['linkdin_url']; ?>" class="btn btn-primary">LinkedIn profile</a></p>
                <!-- Three dot menu for edit and delete -->

            </div>
        </div>
        </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once 'footer.php'; ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>