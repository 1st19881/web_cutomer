<!DOCTYPE html>
<html lang="en">

<?php 
include('head.php') ;
?>

<body id="body">

    <?php 
include('menu.php') ;
include('config/config.php');

$product_id = $_GET['product_id'];

//PHP5
// $query_detail ="SELECT p.*,g.*,cs.*,c.* FROM product AS p
// LEFT JOIN gallery AS g ON p.product_id = g.product_id
// LEFT JOIN category_sub AS cs  ON p.cate_sub_id = cs.cate_sub_id
// LEFT JOIN category as c ON cs.cate_id = c.cate_id
// WHERE p.product_id = '$product_id'";
// $rs_detail = mysql_query($query_detail);
// $row_dt = mysql_fetch_array($rs_detail);

//PHP7
$query_detail ="SELECT p.*,cs.*,c.* FROM product AS p
LEFT JOIN category_sub AS cs  ON p.cate_sub_id = cs.cate_sub_id
LEFT JOIN category as c ON cs.cate_id = c.cate_id
WHERE p.product_id = '$product_id'";
$rs_detail = mysqli_query($conn,$query_detail);
$row_dt = mysqli_fetch_array($rs_detail);

//query_Gallery
$query_gallery = "SELECT p.*,g.* FROM product AS p
LEFT JOIN gallery AS g ON p.product_id = g.product_id
WHERE p.product_id = '$product_id'";
$rs_gallery = mysqli_query($conn,$query_gallery);


?>

    <section class="single-product">
        <div class="container">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop.html">Product</a></li>
                </ol>
            </div>
            <div class="row mt-20">
                <div class="col-md-5">
                    <?php $img = $row_dt['product_pic'];
                    if(empty($img)) {
                        echo " <center> <h1> NO IMAGE </h1> </center>  ";   
                        }else{ ?>
                    <img src="admin/<?php echo $row_dt['product_pic'];?>" alt="" style="border:solid 3px #fd7625;">
                    <?php  } ?>
                </div>
                <div class="col-md-7">
                    <div class="single-product-details">
                        <h2><?php echo $row_dt['product_name'];?></h2>
                        <h3>รุ่น: <?php echo $row_dt['product_model'];?></h3>
                        <h3>หมวดหมู่: <?php echo $row_dt['cate_name'];?></h3>
                        <br>
                        <p>
                            <span>รายละเอียด</span> :
                        </p>
                        <?php echo $row_dt['product_detail'];?>
                        <br>
                        <p> รายละเอียดย่อย :
                        </p>
                        <?php echo $row_dt['product_detail_sub'];?>
                        <br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabCommon mt-20">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">เพิ่มเติม</a>
                            </li>
                        </ul>
                        <div class="tab-content patternbg">
                            <div id="details" class="tab-pane fade active in">
                                <h3 class="text-center">รูปภาพเพิ่มเติม</h3>
                                <br>
                                <?php while($row_gall = mysqli_fetch_array($rs_gallery)){ ?>
                                <img class="" src="admin/<?php echo $row_gall['gallery_pic'];?>" width="100%" alt=""
                                    style="border:solid 2px #fd7625;padding:2px;">
                                <div class="text-center">
                                    <p>
                                    <h4><?php echo $row_gall['pic_name'];?></h4>
                                    </p>
                                    <p>
                                    <h4><?php echo $row_gall['pic_detail'];?></h4>
                                    </p>
                                    <br>
                                    <br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




   

    <?php 
include('footer.php') ;
?>


</body>

</html>