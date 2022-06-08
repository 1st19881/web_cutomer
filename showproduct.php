<?php 

include('config/config.php');
$select_p ="SELECT * FROM product limit 12";
$result_p = mysqli_query($conn,$select_p);

?>
<section class="products section bg-gray">
    <div class="container">
        <div data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="2000">
            <div class="title text-center">
                <h4 style="color:#fd7625;">PRODUCTS</h4>
                <h1 class="page-name">สินค้าของเรา</h1>
                <hr style=" border: solid 0.35rem #fd7625;display:block;width:10%;">
            </div>
            <div class="row">

                <?php  while($rs_p =mysqli_fetch_array($result_p)){  ?>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="admin/<?php echo $rs_p['product_pic'];  ?>"
                                alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                            <p class="price">$200</p>
                        </div>
                    </div>
                </div>
                <?php } ?>


                <!-- Modal -->
                <div class="modal product-modal fade" id="product-modal">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="tf-ion-close"></i>
                    </button>
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <div class="modal-image">
                                            <img class="img-responsive"
                                                src="assets/template/images/shop/products/modal-product.jpg"
                                                alt="product-img" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="product-short-details">
                                            <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                                            <p class="product-price">$200</p>
                                            <p class="product-short-description">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto
                                                nihil
                                                cum. Illo laborum numquam rem aut officia dicta cumque.
                                            </p>
                                            <a href="cart.html" class="btn btn-main">Add To Cart</a>
                                            <a href="product-single.html" class="btn btn-transparent">View Product
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal -->

            </div>
        </div>
    </div>
</section>

<style>
.product-item {
    border: solid 0.25rem #fd7625;
}
</style>