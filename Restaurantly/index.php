<?php
include_once "../model/DB_Manager2.class.php";
include_once "../model/About.class.php";
include_once "../model/Slider.class.php";
include_once "../model/About.class.php";

$database = new DB_Manager2();
$get_welcome = $database-> get_all_welcome();
$get_about = $database->get_all_about();
$get_chef = $database-> get_all_chefs();
$get_slider = $database->get_all_slider();
$get_all_menu = $database->get_all_menu();
$get_group = $database->get_group_type();
$get_contact = $database->get_all_contact();

foreach ($get_contact as $contact) {
}



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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

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
<section id="hero" class="d-flex align-items-center">
    <?php foreach($get_welcome as $welcome): ?>
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1><?php echo $welcome['title1'] ?></h1>
                <h2><?php echo $welcome['title2'] ?></h2>

            </div>
            <?php endforeach; ?>
            <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in"
                 data-aos-delay="200">
                <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a>
            </div>

        </div>
    </div>
</section><!-- End Hero -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
        <?php foreach($get_about as $about): ?>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                    <div class="about-img">
                        <img name="about-image" src="assets/img/<?php echo $about['picture'] ?>" alt="" width="650px" height="480px">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h2><?php echo $about['title'] ?></h2>
                    <h3><i><?php echo $about['subTitle'] ?></i></h3>
                    <p>
                        <?php echo $about['text'] ?>
                    </p>
                </div>
            </div>
            <br><hr style="opacity: unset">
        </div>
        <?php endforeach; ?>
    </section><!-- End About Section -->

     <!-- ======= Chefs Section ======= -->
     <section id="chefs" class="chefs">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Chefs</h2>
                <p>Our Professional Chefs</p>
            </div>

            <div class="row justify-content-md-center">
                <?php foreach($get_chef as $chef): ?>
                <div class="col-3">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                        <img src="assets/img/chefs/<?php echo $chef['avatar'] ?>" class="img-fluid1" alt=""
                             height="416" width="416">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h3><?php echo $chef['name'] . " " .$chef['lastname'] ?></h3>
                                <h4><?php echo $chef['poste']?></h4>
                                <h6><?php echo $chef['description']?></h6>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section><!-- End Chefs Section -->

<!-- ======= Events Section ======= -->
<section id="events" class="events">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Events</h2>
                <p>Organize Your Events in our Restaurant</p>
            </div>

            <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <?php foreach ($get_slider as $single_slider) : ?>
                        <div class="swiper-slide">
                            <div class="row event-item">
                                <div class="col-lg-6">
                                    <img src="assets/img/<?php echo $single_slider['picture'] ?>" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-6 pt-4 pt-lg-0 content">
                                    <h3><?php echo $single_slider['title'] ?></h3>
                                    <div class="price">
                                        <p><span>$<?php echo $single_slider['price'] ?></span></p>
                                    </div>
                                    <p class="fst-italic">
                                        <?php echo $single_slider['text'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Events Section -->

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

                </div>

            </div>
        </section><!-- End Menu Section -->
        
          <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>
        </div>

        <div data-aos="fade-up">
            <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container" data-aos="fade-up">

            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p name="contact-location"><?php echo $contact['location'] ?></p>
                        </div>

                        <div class="open-hours">
                            <i class="bi bi-clock"></i>
                            <h4>Open Hours:</h4>
                            <p name="contact-hours">
                                Monday-Saturday:<br>
                                <?php echo $contact['open'] ?> AM - <?php echo $contact['close'] ?> PM
                            </p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p name="contact-email"><?php echo $contact['email'] ?></p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p name="contact-number"><?php echo $contact['phone'] ?></p>
                        </div>

                    </div>

                    <div class="social-links mt-3">
                        <a name="contact-twitter"
                           href="https://www.youtube.com/watch?v=0qJxp7LwGd0&ab_channel=CrunchyrollCollection"
                           target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a name="contact-facebook"
                           href="https://www.youtube.com/watch?v=0qJxp7LwGd0&ab_channel=CrunchyrollCollection"
                           class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a name="contact-instagram"
                           href="https://www.youtube.com/watch?v=0qJxp7LwGd0&ab_channel=CrunchyrollCollection"
                           class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a name="contact-skype"
                           href="https://www.youtube.com/watch?v=0qJxp7LwGd0&ab_channel=CrunchyrollCollection"
                           class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a name="contact-linkedin"
                           href="https://www.youtube.com/watch?v=0qJxp7LwGd0&ab_channel=CrunchyrollCollection"
                           class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                       required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                   required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="8" placeholder="Message"
                                      required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Send Message</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->


<!-- ======= Footer ======= -->
<?php
include_once "./footer.php";
?>

<div class="container">
    <div name="index-footer" class="copyright">
        &copy; Copyright Restaurantly. All Rights Reserved
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