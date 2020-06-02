
<div class="footer-dark">
        <footer>
            <div class="row" id="footrow">
                <div class="col col-xl-4">
                    <h3>RELOCATION STATION</h3>
                    <ul>
                        <li><a href="#"><br>We are a fully committed team of PARTNERS that come from a wide array of backgrounds, which help us offer the best moving experience with your best interest at heart.&nbsp;<br><br><br></a></li>
                    </ul>
                </div>
                <div class="col col-xl-2">
                </div>
                <div class="col col-xl-3">
                    <h3>Contact Us</h3>
                    <p>26, Lane Street<br>Pretoria, SA<br><br>9AM - 7PM Mon - Sat<br><br>info@relocation.co.za<br>+27&nbsp;11 325 9856<br><br></p>
                </div>

                <div class="col col-xl-3" id="4Center">
                    <h3 id="4Head">Site Map</h3>
                    <ul>
                        <li><a href="index.php#"><br>Home</a></li>
                        <li><a href="index.php#about">About Us</a></li>
                        <li><a href="index.php#services">Services</a></li>
                        <li><a href="index.php#partners">Partners</a></li>
                    </ul>
                </div>
            </div>

        </footer>

        <div class="col" data-aos="flip-right" data-aos-duration="2100">
            <h3></h3>
            <p class="text-center"><br><br><br><br>Get the best moving and household care tips, special offers, and news from our staff.<br></p>
            <div class="col item social">
                <a href="#"><i class="icon ion-social-facebook"></i></a>
                <a href="#"><i class="icon ion-social-twitter"></i></a>
                <a href="#"><i class="icon ion-social-instagram"></i></a>
            </div>
        </div>
            <p class="copyright"><br>
            <strong>©&nbsp;
                <?php echo date("Y");?>
            </strong>&nbsp;Relocation Station
            </p>
    </div>

    <?php
    //echo $page;
    if(!isset($page) || ($page !== "partner")) {
        echo '<script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>';
    }
    ?>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/Card-Carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Sample---How-to-change-text-based-on-dropdown.js"></script>

    <?php
    if(!isset($page) || ($page == "!partner")) echo'
    <!--  paaos.js -->
    ';?>


    </body> 
</html>