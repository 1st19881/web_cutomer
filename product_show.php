<?php //query category
$select_ct ="SELECT * FROM category";
$result_ct = mysqli_query($conn,$select_ct);
?>

<section class="products section">
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="widget widget-category">
                    <h4 class="widget-title">Categories</h4>
                    <ul class="widget-category-list">
                        <?php while($rs_ct=mysqli_fetch_array($result_ct)){ ?>
                        <li> <a href="product.php?act=show_type&cate_id=<?php echo $rs_ct['cate_id'];?>">
                                <?php echo $rs_ct['cate_name'];?></a></li>
                        <?php } ?>
                    </ul>
                </div> <!-- End category  -->
            </div>

            <div class="col-md-9">
                <?php if(empty($_GET['pn'])){
                echo "";
             }else{ ?>
                <h4 class="widget-title">หน้า : <?php echo $_GET['pn'];?> </h4>
                <?php }  ?>
                <div class="row">
                    <?php while($rpd=mysqli_fetch_array($nquery)) { ?>
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="admin/<?php echo $rpd['product_pic'];?>"
                                    alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal"
                                                data-target="#product-modal<?php echo $rpd['product_id'];?>">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="detail.php?product_id=<?php echo $rpd['product_id'];?>"><i class="tf-ion-ios-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-single.html"><a
                                            href="product-single.html"><?php echo $rpd['product_name']; ?></a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal product-modal fade" id="product-modal<?php echo $rpd['product_id'];?>">
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
                                                    src="admin/<?php echo $rpd['product_pic']; ?>" alt="product-img" />
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-6 col-xs-12">
                                            <div class="product-short-details">
                                                <h2 class="product-title"><?php echo $rpd['product_name']; ?></h2>
                                                <br>
                                                <h4 class="product-title">หมวดหมู่: <?php echo $rpd['cate_sub_name']; ?>
                                                    </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal -->

                    <?php  } ?>
                </div>
                <div class="paggin" style="margin-top:50px;">
                    <center>
                        <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
                    </center>
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