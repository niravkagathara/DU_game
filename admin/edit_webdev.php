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

    <section class="section">

      <div class="card mx-auto" style="max-width: 620px;"> <!-- Centering the card -->
        <div class="card-body">
          <h5 class="card-title"> web Developer Form</h5>

          <!-- Developer Form -->
          <form action="con_editwebdev.php" method="post" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
            <input type="hidden" value="<?php echo $g['webdev_photo'] ?>" name="photo">

            <div class="row mb-3">
              <label for="developerName" class="col-sm-2 col-form-label">Developer Name</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $g['webdev_name'] ?>" name="webdev_name" class="form-control" id="developerName" required> <!-- Changed -->
              </div>
            </div>
            <div class="row mb-3">
              <label for="dgree" class="col-sm-2 col-form-label">Degree</label>
              <div class="col-sm-10">
                <select name="degree" class="form-control" id="dgree" required>
                  <option value="" disabled selected>Select Degree</option>
                  <option value="BTech" <?php echo ($g['degree'] == 'BTech') ? 'selected' : ''; ?>>B.Tech</option>
                  <option value="Bca" <?php echo ($g['degree'] == 'Bca') ? 'selected' : ''; ?>>BCA</option>
                  <option value="Bscit" <?php echo ($g['degree'] == 'Bscit') ? 'selected' : ''; ?>>B.Sc IT</option>
                  <option value="Bscit Hons" <?php echo ($g['degree'] == 'Bscit Hons') ? 'selected' : ''; ?>>B.Sc IT Hons</option>
                  <option value="Diploma" <?php echo ($g['degree'] == 'Diploma') ? 'selected' : ''; ?>>Diploma</option>
                </select>
              </div>
            </div>

            <div class="row mb-3" id="degreeSelection" style="display: none;"> <!-- Changed id -->
              <label for="specialization" class="col-sm-2 col-form-label">Branch</label> <!-- Changed label -->
              <div class="col-sm-10">
                <select name="branch" class="form-control" id="specialization">
                  <option value="" disabled selected>Select Branch</option> <!-- Changed option -->
                  <option value="cse" <?php echo ($g['branch'] == 'cse') ? 'selected' : ''; ?>>CSE</option>
                  <option value="civil" <?php echo ($g['branch'] == 'civil') ? 'selected' : ''; ?>>Civil</option>
                  <option value="electrical" <?php echo ($g['branch'] == 'electrical') ? 'selected' : ''; ?>>Electrical</option>
                  <option value="mechanical" <?php echo ($g['branch'] == 'mechanical') ? 'selected' : ''; ?>>Mechanical</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="developerSemester" class="col-sm-2 col-form-label">Semester</label>
              <div class="col-sm-10">
                <select name="sem" class="form-control" id="developerSemester" required>
                  <option value="" disabled selected>Select Semester</option>
                  <?php for ($i = 1; $i <= 8; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($g['sem'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email ID</label>
              <div class="col-sm-10">
                <input type="email" value="<?php echo $g['email_address'] ?>" name="email_address" class="form-control" id="email" required pattern="^[a-zA-Z0-9._%+-]+@darshan\.ac\.in$" title="Only emails ending with @darshan.ac.in are allowed" oninvalid="this.setCustomValidity('Please enter a valid email ending with @darshan.ac.in')" oninput="this.setCustomValidity('')">
                <small class="form-text text-muted">Please use only college email addresses.</small>
              </div>
            </div>
            <div class="row mb-3">
              <label for="phone" class="col-sm-2 col-form-label">Phone No</label>
              <div class="col-sm-10">
                <input type="number" value="<?php echo $g['phone_no'] ?>" name="phone_no" class="form-control" id="phone" >
              </div>
            </div>
            <div class="row mb-3">
              <label for="devImage" class="col-sm-2 col-form-label">Developer Image</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" name="webdev_photo" id="devImage" accept="image/*" >
              </div>
            </div>
            <div class="row mb-3">
              <label for="linkedinUrl" class="col-sm-2 col-form-label">LinkedIn URL</label>
              <div class="col-sm-10">
                <input type="url" value="<?php echo $g['linkdin_url'] ?>" name="linkdin_url" class="form-control" id="linkedinUrl" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="developerRole" class="col-sm-2 col-form-label">Game</label> <!-- नया लेबल -->
              <div class="col-sm-10">
                <input type="text" value="<?php echo $g['webdev_role'] ?>" name="webdev_role" class="form-control" id="developerRole" required> <!-- नया इनपुट -->
              </div>
            </div>
            <div class="row mb-3">
              <label for="status" class="col-sm-2 col-form-label">Developer Status</label> <!-- Added label for game status -->
              <div class="col-sm-10">
                <select name="status" class="form-control" id="status" required> <!-- Dropdown for game status -->
                  <option value="" disabled selected>Select Game Status</option>
                  <option value="active" <?php echo ($g['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                  <option value="inactive" <?php echo ($g['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10 offset-sm-2">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form><!-- End Developer Form -->

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

  <script>
    document.getElementById('dgree').addEventListener('change', function() {
      var degreeSelection = document.getElementById('degreeSelection'); // Corrected id
      if (this.value === 'BTech' || this.value === 'Diploma') {
        degreeSelection.style.display = 'block';
      } else {
        degreeSelection.style.display = 'none';
      }
    });
  </script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>