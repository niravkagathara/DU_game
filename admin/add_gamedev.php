<?php
require_once 'auth_check.php';
// include_once '../classes/Gamedevs.php';
// $dev = new GamesDev();
// $g = $dev->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>game developers</title>
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
                    <h5 class="card-title">Game Developer Form</h5>

                    <!-- Developer Form -->
                    <form action="con_addgamedev.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="developerName" class="col-sm-2 col-form-label">Developer Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="dev_name" class="form-control" id="developerName" required pattern=".+"
                                    oninvalid="this.setCustomValidity('Developer Name cannot be empty.')" 
                                    oninput="this.setCustomValidity('')">
                                <div class="invalid-feedback">Please provide a valid Developer Name.</div>
                                <!-- added invalid-feedback for danger message -->
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="dgree" class="col-sm-2 col-form-label">Degree</label>
                            <div class="col-sm-10">
                                <select name="degree" class="form-control" id="dgree" required>
                                    <option value="" disabled selected>Select Degree</option>
                                    <option value="BTech">B.Tech</option>
                                    <option value="Bca">BCA</option>
                                    <option value="Bscit">B.Sc IT</option>
                                    <option value="Bscit Hons">B.Sc IT Hons</option>
                                    <option value="Diploma">Diploma</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3" id="dgreeSelection" style="display: none;">
                            <label for="specialization" class="col-sm-2 col-form-label">branch</label>
                            <div class="col-sm-10">
                                <select name="branch" class="form-control" id="specialization">
                                    <option value="" disabled selected>Select branch</option>
                                    <option value="cse">CSE</option>
                                    <option value="civil">Civil</option>
                                    <option value="electrical">Electrical</option>
                                    <option value="mechanical">Mechanical</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="developerSemester" class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                                <select name="sem" class="form-control" id="developerSemester" required>
                                    <option value="" disabled selected>Select Semester</option>
                                    <?php for ($i = 1; $i <= 8; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email ID</label>
                            <div class="col-sm-10">
                                <input type="email" name="email_address" class="form-control" id="email" required pattern="^[a-zA-Z0-9._%+-]+@darshan\.ac\.in$" title="Only emails ending with @darshan.ac.in are allowed" oninvalid="this.setCustomValidity('Please enter a valid email ending with @darshan.ac.in')" oninput="this.setCustomValidity('')">
                                <small class="form-text text-muted">Please use only college email addresses.</small> <!-- Note added -->
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Phone No</label>
                            <div class="col-sm-10">
                                <input type="number" name="phone_no" class="form-control" id="phone">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="devImage" class="col-sm-2 col-form-label">Developer Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="dev_photo" id="devImage" accept="image/*" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="linkedinUrl" class="col-sm-2 col-form-label">LinkedIn URL</label>
                            <div class="col-sm-10">
                                <input type="url" name="linkdin_url" class="form-control" id="linkedinUrl" >
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <label for="status" class="col-sm-2 col-form-label">developer Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" id="status" required> 
                                    <option value="" disabled>Select developer Status</option>
                                    <option value="inactive" selected>Inactive</option>
                                    <option value="active" >Active</option>
                                </select>
                            </div>
                        </div> -->
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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        document.getElementById('dgree').addEventListener('change', function() {
            var dgreeSelection = document.getElementById('dgreeSelection');
            if (this.value === 'BTech' || this.value === 'Diploma') {
                dgreeSelection.style.display = 'block';
            } else {
                dgreeSelection.style.display = 'none';
            }
        });
    </script>

</body>

</html>