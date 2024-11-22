<?php
require_once 'auth_check.php';

include_once "../classes/Games.php";
$ge = new Games_a();
$game = $ge->getAll();
include_once '../classes/Gamedevs.php';
$dev = new GamesDev();

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
  <?php if (isset($_SESSION['dele'])) {
            ?>
                <div class="alert alert-danger"> <?php echo $_SESSION['dele']; ?></div>
            <?php
                unset($_SESSION['dele']);
            } ?>
    <div class="pagetitle">
    <div class="d-flex justify-content-between align-items-center">

      <h1>Game</h1>
     
      <a href="add_game.php" class="btn btn-success">Add New Game</a>
    </div>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Games</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php if (isset($_SESSION['msg'])) {
    ?>
      <div class="alert alert-success"> <?php echo $_SESSION['msg']; ?></div>
    <?php
      unset($_SESSION['msg']);
    } ?>
    <section class="section">
      <div class="row">
        <?php foreach ($game as $data) {
        ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3"> <!-- Responsive column classes added -->

            <!-- Card with an image on top -->
            <div class="card">
            <a href="game_detail.php?id=<?php echo $data['game_id'];?>"><img src="../Skyline web/assests/Images/<?php echo $data['game_img']; ?>" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;"> </a>
              <div class="card-body">
              <a href="game_detail.php?id=<?php echo $data['game_id'];?>"><h5 class="card-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $data['game_name']; ?></h5></a>
                <?php $g = $dev->getById($data['gamedev_id']); ?>
                <strong>Developer Name:</strong>
                <p class="card-text"><?php
                                      echo $g['dev_name']; ?></p>
                <strong>Platform:</strong>
                <p class="card-text"><?php echo $data['platform']; ?></p>
                <p class="card-text"><a href="<?php echo '../all_games/'.$data['play_url']; ?>" class="btn btn-primary">Play Game</a></p>
              </div>
              <div class="dropdown" style="position: absolute; top: 10px; right: 10px;">
                <a class="" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i> </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="edit_game.php?id=<?php echo $data['game_id']; ?>">Edit</a></li>
                  <li><a class="dropdown-item" href="game_delete.php?id=<?php echo $data['game_id']; ?>" onclick="return confirm('Are You Sure You Want to delete?');">Delete</a></li>
                </ul>
              </div>
            </div><!-- End Card with an image on top -->

          </div>
        <?php } ?>
      </div>
    </section>

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