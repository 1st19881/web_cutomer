<?php 
//query category
$select_ct ="SELECT * FROM category";
$result_ct = mysqli_query($conn,$select_ct);

//query Products
$modal="SELECT p.*,cs.* from  product as p
INNER JOIN category_sub as cs ON p.cate_sub_id=cs.cate_sub_id ORDER BY product_id  limit 12";
$rsmodal = mysqli_query($conn,$modal);

?>

<section class="sectionpd">
    <div class="container" style="background-color: #fbfbfb;">
        <div class="row">
            <div data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="2000">
                <div class="title text-center">
                    <h4 style="color:#fd7625;">PRODUCTS</h4>
                    <h1 class="page-name">สินค้าของเรา</h1>
                    <hr style=" border: solid 0.35rem #fd7625;display:block;width:10%;">
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <?php while($rpd1=mysqli_fetch_array($rsmodal)) { ?>
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="admin/<?php echo $rpd1['product_pic'];?>"
                                    alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal"
                                                data-target="#product-modal<?php echo $rpd1['product_id'];?>">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="detail.php?product_id=<?php echo $rpd1['product_id'];?>"><i class="tf-ion-ios-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-single.html"><a
                                            href="product-single.html"><?php echo $rpd1['product_name']; ?></a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal product-modal fade" id="product-modal<?php echo $rpd1['product_id'];?>">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="tf-ion-close"></i>
                        </button>
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-6 col-xs-12">
                                            <div class="modal-image">
                                                <img class="img-responsive"
                                                    src="admin/<?php echo $rpd1['product_pic']; ?>" alt="product-img" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12">
                                            <div class="product-short-details">
                                                <h2 class="product-title"><?php echo $rpd1['product_name']; ?></h2>
                                                <br>
                                                <h4 class="product-title">หมวดหมู่:
                                                    <?php echo $rpd1['cate_sub_name']; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal -->

                    <?php  } ?>
                </div>
            </div>



        </div>
    </div>

    </div>
    </div>
</section>

<style>
.product-item {
    display: block;
    border: solid 0.25rem #fd7625;
    height: auto;
    width: 100%;
    padding: 10px;
    margin-bottom: 25px;
}

.product-content {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>