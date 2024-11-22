<?php
require_once 'auth_check.php';
include_once '../classes/Webdevs.php';
$dev = new Webdevs();
$g = $dev->getById($_GET['id']);
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
  <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <a href="javascript:history.back()" class="btn btn-secondary mb-3">Back</a> <!-- बैक बटन जोड़ा गया -->
              <img src="../Skyline web/assests/Images/<?php echo $g['webdev_photo']; ?>" alt="Profile" class="rounded-circle" width="150" height="150">
              <h2><?php echo $g['webdev_name']; ?></h2>
              <p class="card-text"><?php echo $g['webdev_role']; ?></p>
              <table class="table table-bordered"> <!-- बॉर्डर जोड़ने के लिए 'table-bordered' क्लास जोड़ी गई -->
                <tr>
                  <th>Degree</th>
                  <td><?php echo $g['degree']; ?></td>
                </tr>
                <tr>
                  <th>Branch</th>
                  <td><?php echo $g['branch']; ?></td>
                </tr>
                <tr>
                  <th>Semester</th>
                  <td><?php echo $g['sem']; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $g['email_address']; ?></td>
                </tr>
                <tr>
                  <th>Mobile No</th>
                  <td><?php echo $g['phone_no']; ?></td>
                </tr>
                <tr>
                  <th>status</th>
                  <td>
                  <?php if ($g['status'] == 'inactive'): ?>
                        <button class="btn btn-danger"><?php echo $g['status']; ?></button>
                    <?php elseif ($g['status'] == 'active'): ?>
                        <button class="btn btn-success"><?php echo $g['status']; ?></button>
                    <?php endif; ?>
                  </td>
                </tr>
              </table>
                                <p class="card-text"><a href="<?php echo $g['linkdin_url']; ?>" class="btn btn-primary">LinkedIn profile</a></p>
                                <!-- Three dot menu for edit and delete -->

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