<?php
include_once "./classes/Gamedevs.php";
$d = new GamesDev();
$dev = $d->getAll();
include_once './classes/Webdevs.php';
$w=new Webdevs();
$web=$w->getAll();
include_once "./classes/Games.php";
$g = new Games_a();
$all = $g->getAll();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="description"
    content="Faf | Gaming HTML Template from Themescare" />
  <meta
    name="keyword"
    content="game, gaming, videogame, developer, steam, studio, team" />
  <meta name="author" content="Themescare" />
  <!-- Title -->
  <title>DU Games</title>
  <!-- Favicon -->
  <link
    rel="shortcut icon"
    type="image/png"
    href="./Skyline web/assests/Images/Logo.png" />
  <!--Bootstrap css-->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <!--Font Awesome css-->
  <link rel="stylesheet" href="assets/css/all.min.css" />
  <!--Magnific css-->
  <link rel="stylesheet" href="assets/css/magnific-popup.css" />
  <!--Owl-Carousel css-->
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
  <!--NoUiSlider css-->
  <link rel="stylesheet" href="assets/css/nouislider.min.css" />
  <!--Animate css-->
  <link rel="stylesheet" href="assets/css/animate.min.css" />
  <!--Site Main Style css-->
  <link rel="stylesheet" href="assets/css/about.css" />
  <!--Responsive css-->
  <link rel="stylesheet" href="assets/css/responsive.css" />

  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body onmousemove="movePoint(event)">
  <!-- Custom Cursor Start -->
  <!-- <div id="cursor-large"></div>
    <div id="cursor-small"></div> -->
  <!-- Custom Cursor End -->
  <div class="point" id="point"></div>

  <!-- Header Area Start -->
  <?php require_once 'header.php'; ?>
  <!-- Header Area End -->

  <!-- Slider Area Start -->
  <?php require_once 'sidebar-area-about.php'; ?>
  <!-- Slider Area End -->

  <!-- Video Area Start -->
  <!-- Promo Area Start -->

  <?php require_once 'video-section.php'; ?>


  <!-- Promo Area End -->
  <!-- Video Area End -->


  <!-- Team Area Start -->
  <section class="fag-team-area section_100">
    <div class="top-layer"></div>
    <div class="bottom-layer"></div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="site-heading">
            <h2 class="heading_animation" data-aos="zoom-in">
              Team <span>Member</span>
            </h2>
          </div>
        </div>
      </div>

      <div class="my-5">
        <h2 class="team-heading" data-aos="fade-up">Web Developers</h2>
        <p class="mt-3" data-aos="fade-up">
          Get acquainted with our team, driven by a shared enthusiasm for web
          development.A dedicated group committed to web development.Explore
          our collective efforts in the world of web development. .
        </p>
      </div>

      <div class="row" id="webTeamList">
        <?php  
        foreach($web as $webdata){
          
          if($webdata['status']=='active'){
        ?>
        <div class="col-lg-3 col-sm-6" data-aos="fade-up">
          <div class="team-item">
            <div class="team-image">
              <img src="Skyline web/assests/Images/<?php echo $webdata['webdev_photo'] ?>" alt="<?php echo $webdata['webdev_name'] ?>">
            </div>
            <div class="team-details">
              <div class="team-mem">
                <h3><?php echo $webdata['webdev_name'] ?></h3>
              </div>

              <?php if($webdata['webdev_name']=='Vijay Shekhat') {?>

<span>Mentor:</span><br />
<span style="font-size: 18px; color: white">Mentor: <?php echo $webdata['webdev_name']; ?></span>
  <?php }else{ 
    ?>
    <span>Web Developer</span><br />
              <span style="font-size: 18px; color: white">Game: <?php echo $webdata['webdev_role'] ?></span>
    <?php } ?>



              
              <div class="team-social">
                <div class="game-buy">
                  <a href="<?php echo $webdata['linkdin_url'] ?>" class="fag-btn-outline">LinkedIn Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }}?>
      </div>

      <div class="my-5">
        <h2 class="team-heading" data-aos="fade-up">Game Developers</h2>
        <p class="mt-3" data-aos="fade-up">
          Meet the talented student game developers behind these projects.
          With a shared passion for gaming and development, this team is
          dedicated to creating immersive gaming experiences. Explore their
          creations and witness the next generation of game development
        </p>
      </div>

      <div class="row" id="gameTeamList">
        <?php
        foreach ($dev as $data) {
          if($data['status']=='active'){

        ?>
          <div class="col-lg-3 col-sm-6" data-aos="fade-up">
            <div class="team-item">
              <div class="team-image">
                <img src="Skyline web/assests/Images/<?php echo $data['dev_photo']; ?>" alt="<?php echo $data['dev_name']; ?>">
              </div>
              <div class="team-details">
                <div class="team-mem">
                  <h3><?php echo $data['dev_name']; ?></h3>
                </div>

                <span>Game Developer:</span><br />
                <span style="font-size: 18px; color: white">Game: <?php echo $data['dev_name']; ?></span>
                  
               
                <div class="team-social">
                  <div class="game-buy">
                    <a href="<?php echo $data['linkdin_url']; ?>" class="fag-btn-outline">LinkedIn Profile</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }} ?>
      </div>
    </div>
  </section>
  <!-- Team Area End -->

  <!-- Footer Area Start -->
  <?php require_once 'footer.php'; ?>
  <!-- Footer Area End -->

  <!--Jquery js-->
  <script src="assets/js/jquery.min.js"></script>
  <!--Bootstrap js-->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--Owl-Carousel js-->
  <script src="assets/js/owl.carousel.min.js"></script>
  <!--Magnific js-->
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <!--wNumb js-->
  <script src="assets/js/wNumb.js"></script>
  <!--NoUiSlider js-->
  <script src="assets/js/nouislider.min.js"></script>
  <!-- Isotop Js -->
  <script src="assets/js/isotope.pkgd.min.js"></script>
  <script src="assets/js/custom-isotop.js"></script>
  <!-- Counter JS -->
  <script src="assets/js/jquery.counterup.min.js"></script>
  <!-- Custom Clock JS -->
  <script src="assets/js/clock-custom.js"></script>
  <!--Main js-->
  <script src="assets/js/main.js"></script>

  <script src="Skyline web/main.js"></script>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- <script src="./WebsiteDevelperRender.js"></script> -->
  <!-- <script src="./GameDeveloperRender.js"></script> -->
  <script>
    AOS.init();

    AOS.init({
      delay: 50,
      duration: 1000,
    });
  </script>

  <script>
    let Point = document.getElementById("point");

    function movePoint(e) {
      Point.style.top = e.clientY + "px";
      Point.style.left = e.clientX + "px";
    }
  </script>
</body>

</html>