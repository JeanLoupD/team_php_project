<?php
include_once "../model/DB_Manager2.class.php";
include_once "../model/Menu.class.php";

$database = new DB_Manager2();
$get_all_menu = $database->get_all_menu();
$get_group = $database->get_group_type();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Restaurantly Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Restaurantly - v3.8.0
    * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0">Final Project</a></h1>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="about.php">About</a></li>
                    <li><a class="nav-link scrollto" href="services.php">Services</a></li>
                    <li><a class="nav-link scrollto" href="portfolio.php">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
                    <li><a class="nav-link scrollto" href="../admin/login.php">Admin</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <main id="main">

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Menu</h2>
                    <p>Check Our Tasty Menu</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <?php foreach ($get_group as $group) : ?>
                                <li data-filter=".filter-<?= $group['type'] ?>"><?= ucfirst($group['type']) ?></li>
                            <?php endforeach ?>
                            <!-- <li data-filter=".filter-starters">Starters</li>
                            <li data-filter=".filter-salads">Salads</li>
                            <li data-filter=".filter-specialty">Specialty</li> -->
                        </ul>
                    </div>
                </div>

                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                    <?php foreach ($get_all_menu as $menu) : ?>
                        <div class="col-log-6 menu-item filter-<?= $menu['type'] ?>" style="width: 50%;">
                            <img name="port-pic1" src="assets/img/menu/<?= $menu['picture'] ?>" class="menu-img" alt="">
                            <div class="menu-content">
                                <a name="port-item1" href="#"><?= $menu['name'] ?></a><span>$<?= $menu['price'] ?></span>
                            </div>
                            <div name="port-ingredient1" class="menu-ingredients">
                                <?= $menu['description'] ?>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <!-- <div class="col-lg-6 menu-item filter-starters">
                        <img name="port-pic1" src="assets/img/menu/lobster-bisque.jpg" class="menu-img" alt="">
                        <div class="menu-content">
                            <a name="port-item1" href="#">Lobster Bisque</a><span>$5.95</span>
                        </div>
                        <div name="port-ingredient1" class="menu-ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-specialty">
                    <img name="port-pic2" src="assets/img/menu/bread-barrel.jpg" class="menu-img" alt="">
                    <div class="menu-content">
                        <a name="port-item2" href="#">Bread Barrel</a><span>$6.95</span>
                    </div>
                    <div name="port-ingredient2" class="menu-ingredients">
                        Lorem, deren, trataro, filede, nerada
                    </div>
                </div>

                <div class="col-lg-6 menu-item filter-starters">
                    <img name="port-pic3" src="assets/img/menu/cake.jpg" class="menu-img" alt="">
                    <div class="menu-content">
                        <a name="port-item3" href="#">Crab Cake</a><span>$7.95</span>
                    </div>
                    <div name="port-ingredient3" class="menu-ingredients">
                        A delicate crab cake served on a toasted roll with lettuce and tartar sauce
                    </div>
                </div> -->

                    <!-- <div class="col-lg-6 menu-item filter-salads">
                    <img src="assets/img/menu/caesar.jpg" class="menu-img" alt="">
                    <div class="menu-content">
                        <a href="#">Caesar Selections</a><span>$8.95</span>
                    </div>
                    <div class="menu-ingredients">
                        Lorem, deren, trataro, filede, nerada
                    </div>
                </div>

                <div class="col-lg-6 menu-item filter-specialty">
                    <img src="assets/img/menu/tuscan-grilled.jpg" class="menu-img" alt="">
                    <div class="menu-content">
                        <a href="#">Tuscan Grilled</a><span>$9.95</span>
                    </div>
                    <div class="menu-ingredients">
                        Grilled chicken with provolone, artichoke hearts, and roasted red pesto
                    </div>
                </div>

                <div class="col-lg-6 menu-item filter-starters">
                    <img src="assets/img/menu/mozzarella.jpg" class="menu-img" alt="">
                    <div class="menu-content">
                        <a href="#">Mozzarella Stick</a><span>$4.95</span>
                    </div>
                    <div name="port-ingredient6" class="menu-ingredients">
                        Lorem, deren, trataro, filede, nerada
                    </div>
                </div> -->

                    <!-- <div class="col-lg-6 menu-item filter-salads">
                    <img name="port-pic7" src="assets/img/menu/greek-salad.jpg" class="menu-img" alt="">
                    <div class="menu-content">
                        <a name="port-item7" href="#">Greek Salad</a><span>$9.95</span>
                    </div>
                    <div name="port-ingredient7" class="menu-ingredients">
                        Fresh spinach, crisp romaine, tomatoes, and Greek olives
                    </div>
                </div>

                <div class="col-lg-6 menu-item filter-salads">
                    <img name="port-pic8" src="assets/img/menu/spinach-salad.jpg" class="menu-img" alt="">
                    <div class="menu-content">
                        <a name="port-item8 " href="#">Spinach Salad</a><span>$9.95</span>
                    </div>
                    <div name="port-ingredient8" class="menu-ingredients">
                        Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
                    </div>
                </div>

                <div class="col-lg-6 menu-item filter-specialty">
                    <img name="port-pic9" src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
                    <div class="menu-content">
                        <a name="port-item9 " href="#">Lobster Roll</a><span>$12.95</span>
                    </div>
                    <div name="port-ingredient9" class="menu-ingredients">
                        Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
                    </div>
                </div> -->

                </div>

            </div>
        </section><!-- End Menu Section -->


        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">

            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Gallery</h2>
                    <p>Some photos from Our Restaurant</p>
                </div>
            </div>

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Gallery Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php
    include_once "./footer.php";
    ?>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Restaurantly</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
    <!-- End Footer -->


    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>