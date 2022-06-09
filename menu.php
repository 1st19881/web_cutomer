<style>
.dropdown a:hover {
    color: #fd7625 !important;
    font-size: 14px !important;
}
.dropdown-menu{
    color:#fff !important;
}

.dropdown-menu a:hover {
    color: #fff !important;
}
</style>

<?php 
include('config/config.php');
$q_category ="SELECT * FROM category ";
$result_ct = mysqli_query($conn,$q_category);
$count_category =" ";
?>
<!-- Main Menu Section -->
<section class="menu" style="background-color: #000; !important;">
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php"> <img href="index.php" src="admin/images/logo/logo-HYDROMATIC-w-.png.webp"
                        width="50%" alt=""></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar" style="background-color:#fd7625;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- / .navbar-header -->

            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">
                    <li class="dropdown ">
                    </li>
                    <!-- Home -->
                    <li class="dropdown ">
                        <a href="index.php" style="color:#fff; !important;font-size:16px;">Home</a>
                    </li><!-- / Home -->

                    <li class="dropdown ">
                        <a href="product.php" style="color:#fff; !important;font-size:16px;">PRODUCT</a>
                    </li>

                    <!-- Pages -->
                    <li class="dropdown full-width dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false"
                            style="color:#fff; !important;font-size:16px;">CATEGROY <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu ">
                            <div class="row">
                                <?php while($rs_ct = mysqli_fetch_array($result_ct)){  ?>
                                <div class="col-md-3">
                                    <ul>
                                        <li><a href="product.php?act=show_type&cate_id=<?php echo $rs_ct['cate_id'] ;  ?>"
                                                style="font-size:1.5rem;"><?php echo $rs_ct['cate_name'] ;  ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <?php }  ?>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Pages -->
                    <!-- / Blog -->
                    <li class="dropdown ">
                        <a href="index.html" style="color:#fff; !important;font-size:16px;">DOWLOAD</a>
                    </li>
                    <li class="dropdown ">
                        <a href="contact.php" style="color:#fff; !important;font-size:16px;">CONTACT</a>
                    </li>
                </ul><!-- / .nav .navbar-nav -->

            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>