<?php 

 
//  echo '<pre>';
// 	print_r($_GET);
// 	echo '</pre>';
// 	exit;

 $cate_id = $_GET['cate_id'];

 $mysql_query22 ="SELECT * FROM product as p
LEFT JOIN category_sub as cs on p.cate_sub_id=cs.cate_sub_id
LEFT JOIN category as c on c.cate_id=cs.cate_id 
WHERE c.cate_id='$cate_id'";
 $nrs2 = mysqli_query($conn,$mysql_query22);

 $mysql3 ="SELECT * FROM product as p
 LEFT JOIN category_sub as cs on p.cate_sub_id=cs.cate_sub_id
 LEFT JOIN category as c on c.cate_id=cs.cate_id 
 WHERE c.cate_id='$cate_id'";
  $n3 = mysqli_query($conn,$mysql3);
  $n33 = mysqli_fetch_array($n3);

//query category
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
                <?php if(empty($n33)) { ?>
                <h1 class="text-center">เดียวสินค้าจะมาเร็วๆๆนี้</h1>
                <?php  }else{?>
                <div class="title text-center">
                    <h1 class="page-name"><?php echo $n33['cate_name'];?></h1>
                    <hr style=" border: solid 0.28rem #fd7625;display:block;width:10%;">
                </div>
                <?php } ?>
                <div class="row">
                    <?php while($rpd1=mysqli_fetch_array($nrs2)) { ?>
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="admin/<?php echo $rpd1['product_pic']; ?>"
                                    alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal"
                                                data-target="#product-modal<?php echo $rpd1['product_id']; ?>">
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
                                <h4><a href="product-single.html"><?php echo $rpd1['product_name']; ?></a></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal product-modal fade" id="product-modal<?php echo $rpd1['product_id']; ?>">
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
                    </div>
                    <?php  } ?>
                </div>
            </div>
            <!-- /.modal -->

        </div>
    </div>

    </div>
    </div>
</section>
<style>
.product-item {
    border: solid 0.25rem #fd7625;
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