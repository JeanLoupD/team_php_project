<?php

$database = new DB_Manager2();
$get_footer = $database->get_all_footer();

foreach ($get_footer as $footer) {
}
?>

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div style="display: flex;justify-content: space-between">
                <div class="col-lg-3">
                    <div>
                        <img src="assets/img/<?php echo $footer['picture'] ?>" alt="" style="width:375px; height:210px;">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3><?php echo $footer['title'] ?></h3>
                        <p>
                            <?php echo $footer['address'] ?><br>
                        <p>
                            <?php echo $footer['area'] ?><br><br>   </p>
                        <p> <strong>Phone:</strong> <?php echo $footer['phone'] ?><br>   </p>
                        <p><strong>Email:</strong> <?php echo $footer['email'] ?><br>   </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="services.php">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="portfolio.php">Portfolio</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

