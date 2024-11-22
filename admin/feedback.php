<?php
require_once 'auth_check.php';
include_once '../classes/Feedback.php';
$dev = new Feedback();
$g = $dev->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
  <div class="card">
            <div class="card-body">
              <h5 class="card-title">Feedback Table</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Player Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Comment</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($g as $feedback) : ?>

                  <tr>
                <th scope="row"><?php echo $feedback['id']; ?></th>
            <td><?php echo $feedback['player_name']; ?></td>
            <td><?php echo $feedback['category']; ?></td>
            <td><?php echo $feedback['comment']; ?></td>
            <td><a href="delete_feedback.php?id=<?php echo $feedback['id']; ?>" onclick="return confirm('Are You Sure You Want to delete?');" style="color: red;"><i class="bi bi-trash"></i> Delete</a></td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
              <!-- End Default Table Example -->
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