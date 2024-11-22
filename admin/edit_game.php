<?php
require_once 'auth_check.php';

include_once "../classes/Games.php";
$ge = new Games_a();
$game = $ge->getById($_GET['id']);
include_once '../classes/Gamedevs.php';
$dev = new GamesDev();
$d=$dev->getAll();

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

    <section class="section">

      <div class="card mx-auto" style="max-width: 620px;"> <!-- Centering the card -->
        <div class="card-body">
          <h5 class="card-title">Developer Form</h5>

          <!-- Developer Form -->
          <form action="con_editgame.php" method="post" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
          <input type="hidden" value="<?php echo $game['game_img'] ?>" name="photo">
          <input type="hidden" value="<?php echo $game['play_url'];?>" name="url">


            <div class="row mb-3">
              <label for="gamedevId" class="col-sm-2 col-form-label">Game Developer</label>
              <div class="col-sm-10">
                <select name="gamedev_id" class="form-control" id="gamedevId" required>
                  <option value="" disabled>Select Developer</option>
                  <?php foreach ($d as $developer): ?>
                    <option value="<?php echo $developer['gamedev_id']; ?>" <?php echo ($developer['gamedev_id'] == $game['gamedev_id']) ? 'selected' : ''; ?>><?php echo $developer['dev_name']; ?></option> <!-- Show selected developer -->
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="gameName" class="col-sm-2 col-form-label">Game Name</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo isset($game['game_name']) ? $game['game_name'] : ''; ?>" name="game_name" class="form-control" id="gameName" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="gameImage" class="col-sm-2 col-form-label">Game Image</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" name="game_img" id="gameImage" accept="image/*"> <!-- Removed required to allow showing existing image -->
                
              </div>
            </div>
            <div class="row mb-3">
              <label for="playUrl" class="col-sm-2 col-form-label">Upload Game Folder (ZIP)</label>
              <div class="col-sm-10">
                <input type="file" name="play_url" class="form-control" id="playUrl" accept=".zip"> <!-- Removed required to allow showing existing file -->
                
              </div>
            </div>
            <div class="row mb-3">
              <label for="platform" class="col-sm-2 col-form-label">Platform</label>
              <div class="col-sm-10">
                <select name="platform" class="form-control" id="platform" required>
                  <option value="" disabled>Select Platform</option>
                  <option value="desktop" <?php echo ($game['platform'] == 'desktop') ? 'selected' : ''; ?>>Desktop</option>
                  <option value="mobile" <?php echo ($game['platform'] == 'mobile') ? 'selected' : ''; ?>>Mobile</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="verification_status" class="col-sm-2 col-form-label">verification_status</label>
              <div class="col-sm-10">
                <select name="verification_status" class="form-control" id="verification_status" required>
                  <option value="" disabled>Select verification_status</option>
                  <option value="pending" <?php echo ($game['verification_status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                  <option value="verify" <?php echo ($game['verification_status'] == 'verify') ? 'selected' : ''; ?>>Verify</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="gameStatus" class="col-sm-2 col-form-label">Game Status</label> <!-- Added label for game status -->
              <div class="col-sm-10">
                <select name="game_status" class="form-control" id="gameStatus" required> <!-- Dropdown for game status -->
                  <option value="" disabled selected>Select Game Status</option>
                  <option value="active" <?php echo ($game['game_status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                  <option value="inactive" <?php echo ($game['game_status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10 offset-sm-2">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
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