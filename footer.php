<footer class="footer section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="social-media">
                    <li>
                        <a href="https://www.facebook.com/themefisher">
                            <i class="tf-ion-social-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/themefisher">
                            <i class="tf-ion-social-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/themefisher">
                            <i class="tf-ion-social-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.pinterest.com/themefisher/">
                            <i class="tf-ion-social-pinterest"></i>
                        </a>
                    </li>
                </ul>
                <ul class="footer-menu text-uppercase">
                    <li>
                        <a href="contact.html">CONTACT</a>
                    </li>
                    <li>
                        <a href="shop.html">SHOP</a>
                    </li>
                    <li>
                        <a href="pricing.html">Pricing</a>
                    </li>
                    <li>
                        <a href="contact.html">PRIVACY POLICY</a>
                    </li>
                </ul>
                <p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a
                        href="https://themefisher.com/">Themefisher</a></p>
            </div>
        </div>
    </div>
</footer>

<!-- 
    Essential Scripts
    =====================================-->

<!-- Main jQuery -->
<script src="assets/template/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.1 -->
<script src="assets/template/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Bootstrap Touchpin -->
<script src="assets/template/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<!-- Instagram Feed Js -->
<script src="assets/template/plugins/instafeed/instafeed.min.js"></script>
<!-- Video Lightbox Plugin -->
<script src="assets/template/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
<!-- Count Down Js -->
<script src="assets/template/plugins/syo-timer/build/jquery.syotimer.min.js"></script>

<!-- slick Carousel -->
<script src="assets/template/plugins/slick/slick.min.js"></script>
<script src="assets/template/plugins/slick/slick-animation.min.js"></script>

<!-- Google Mapl -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script type="text/javascript" src="assets/template/plugins/google-map/gmap.js"></script>

<!-- Main Js File -->
<script src="assets/template/js/script.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>



<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

<script>
AOS.init();
</script>


<script src="assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<script>
var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1500,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
</script>