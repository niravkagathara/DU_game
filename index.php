<?php
include_once "./classes/Games.php";
include_once "./classes/Gamedevs.php";
$d=new GamesDev();
$g = new Games_a();
$game = $g->getAll();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Faf | Gaming HTML Template from Themescare">
    <meta name="keyword" content="game, gaming, videogame, developer, steam, studio, team">
    <meta name="author" content="Themescare">
    <!-- Title -->
    <title>DU Games</title>
    <!--Bootstrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Font Awesome css-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!--Magnific css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--Owl-Carousel css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!--NoUiSlider css-->
    <link rel="stylesheet" href="assets/css/nouislider.min.css">
    <!--Animate css-->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!--Site Main Style css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./Skyline web/assests/Images/Logo.png">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" type="text/css" href="./assets/css/Tippy.css">

    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css">

    <style>
        .loader-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #ff7a21;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Hide the loader when the content is loaded */
        .loaded .loader-container {
            display: none;
        }
    </style>

</head>

<body onmousemove="movePoint(event)">


    <!-- Custom Cursor Start -->
    <!-- <div id="cursor-large"></div>
    <div id="cursor-small"></div> -->
    <!-- Custom Cursor End -->

    <!-- <div class="loader-container">
        <div class="loader"></div>
    </div> -->

    <!-- <div class="magnate-container" onmousemove="movePoint(event)"> -->

    <!-- <div class="point" id = "point"></div> -->

    <!-- </div> -->


    <!-- Header Area Start -->
    <?php require_once 'header.php'; ?>
    <!-- Header Area End -->

    <div class="point" id="point"></div>


    <!-- Slider Area Start -->

    <!-- Slider Area End -->

    <div class="alert-box visually-hidden" id="alert" role="alert">



    </div>


    <!-- Video Area Start -->

    <!-- Video Area End -->

    <?php require_once 'content.php'; ?>

    <!-- Games Area Strat -->
    <section class="fag-games-area section_140" id="game-container">
        <div class="container">
            <div class="row" data-aos="fade-down">
                <div class="col-12">
                    <div class="site-heading">
                        <h2 class="heading_animation">our <span>games</span></h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="games-masonary">
                        <div class="projectFilter project-btn">
                            <ul>
                                <li><a href="#" data-filter="*" class="current" data-aos="fade-down" data-aos-delay="150">show all</a></li>
                                <li><a href="#" data-filter=".desktop" data-aos="fade-down" data-aos-delay="300">General Games</a></li>
                                <li><a href="#" data-filter=".mobile" data-aos="fade-down" data-aos-delay="400">Kids Games</a></li>
                            </ul>
                        </div>
                        <!-- end game item -->

                        <!-- end game item -->

                        <!-- <div class="loader-container" id="loadingIndicator">
                            <div class="loader"></div>
                        </div> -->

                        <div id="gamesList" class="clearfix gamesContainer">
                            <?php foreach ($game as $data) {
                                $dev=$d->getById( $data['gamedev_id']);
                                if($data['game_status']=='active'){
                            ?>
                                <div class="games-item <?php echo $data['platform']; ?> game-card" data-aos="fade-up" data-tippy-content="<strong>Developer:</strong> <?php echo $dev['dev_name']; ?>">
                                    <div class="games-single-item img-contain-isotope">
                                        <div class="games-thumb">
                                            <div class="games-thumb-image">
                                                <a href="#">
                                                    <img src="./Skyline web/assests/Images/<?php echo $data['game_img']; ?>" alt="<?php echo $data['game_name']; ?>" lazy="true">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="games-desc">
                                            <div class="game-title">
                                                <h3 style="font-size: 23px;"><a href="#"><?php echo $data['game_name']; ?></a></h3>
                                            </div>
                                            <div class="game-action demo">
                                                <div class="game-buy">
                                                    <a href="<?php echo 'all_games/'.$data['play_url']; ?>" class="fag-btn-outline">Play</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Games Area End -->

    <!-- FeedBack Form Area start -->
    <?php require_once 'feedback.php'; ?>
    <!-- FeedBack Form Area End -->

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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        AOS.init({

            delay: 100,
            duration: 1500,

        });
    </script>
    <!-- <script src="./GameRender.js"></script> -->
    <script src="https://smtpjs.com/v3/smtp.js">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    <script>
        window.addEventListener('load', () => {

            // setTimeout(() => {

            //     const user = localStorage.getItem("User") ? user : "User";

            //     const alert = document.getElementById("alert");

            //     alert.classList.add("alert");
            //     alert.classList.add("alert-primary");
            //     alert.classList.remove("visually-hidden");

            //     if (user != null) {

            //         alert.innerHTML = "Hello, " + user;

            //     } else {

            //         alert.innerHTML = "Hello, user";
            //     }

            // }, 5000)

            setTimeout(() => {

                const alert = document.getElementById("alert");

                alert.classList.remove("alert");
                alert.classList.remove("alert-primary");
                alert.classList.add("visually-hidden");

            }, 20000)

        })

        // Simulate the loading process
        window.addEventListener('load', () => {
            const loaderContainer = document.querySelector('.loader-container');
            loaderContainer.classList.add('loaded');
        });

        // Remove the loader when the content is loaded
        document.addEventListener('DOMContentLoaded', () => {
            const loaderContainer = document.querySelector('.loader-container');
            loaderContainer.style.display = 'none';
        });
    </script>

    <script>
        const InsertValueInDropDown = (value) => {

            let CurrentDropDownValue = document.getElementById("currentDropdownValue");
            let Menu = document.getElementById("menu");

            console.log("Current Value : " + CurrentDropDownValue.innerHTML);

            console.log("Selected Value : " + value.innerHTML);

            CurrentDropDownValue.innerHTML = value.innerHTML;

            // Menu.style.display = "none";
        }

        function countLength() {

            var count = document.getElementById("count");
            const feedback = document.getElementById("feedback");

            count.innerHTML = 100 - feedback.value.length + "/100"
        }

        const PlayerName = document.getElementById("playerName");
        const Category = document.getElementById("currentDropdownValue");
        const Feedback = document.getElementById("feedback");

        const sendMail = () => {

            console.log("Drop Down Value : " + Category.innerHTML);

            console.log(PlayerName.value);
            console.log(Category.innerHTML);
            console.log(Feedback.value);

            localStorage.setItem("User", PlayerName.value);

            const temp = "Feedback Form - " + Category.innerHTML;

            try {

                if (PlayerName.value != "" && Category.innerHTML != "" && Feedback.value != "") {

                    Email.send({
                        SecureToken: "8f9adde8-2481-4ff5-aeed-1ba2ed049b35",
                        To: 'dugames682@gmail.com',
                        From: "dugames682@gmail.com",
                        Subject: temp,
                        Body: "Player Name : " + PlayerName.value + "<br/> Category : " + Category.innerHTML + "<br/> Feedback : " + Feedback.value
                    }).then(
                        message => alert1("Good job!", message, "success")
                    );

                } else {

                    alert1("Something went wrong!", "Please Enter The Value", "error");
                }

            } catch (e) {

                // Swal.fire({
                //     icon: "error",
                //     title: "Oops...",
                //     text: "Something went wrong!",
                //     footer: '<a href="#">Why do I have this issue?</a>'
                // });

                alert1("Something went wrong!", "Please Enter The Value", "error");
            }
        }

        function alert1(title, res, icon) {

            Swal.fire({
                title: title,
                text: res,
                icon: icon
            });
        }

        let Point = document.getElementById("point");

        function movePoint(e) {

            Point.style.top = e.clientY + "px";
            Point.style.left = e.clientX + "px";
            console.log(e);
        }
    </script>

</body>

</html>