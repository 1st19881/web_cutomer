<?php

include('../config/config.php'); 
// PHP5 
// $query = "SELECT p.product_name,p.product_model,p.product_pic,c.cate_name,c.cate_nameTH FROM product as p 
// JOIN   category as c ON p.cate_sub_id=c.cate_id ";
// $result = mysql_query($query)or die ("Error in query: $query
// query " . mysql_error());

// PHP7

$act = (isset($_GET['act']) ? $_GET['act'] : '');
    if($act=="editgall"){
      echo '';
    }else{?>
<button type="button" class="btn btn-primary btn-flat my-3" data-toggle="modal" data-target="#gall"
    data-whatever="@mdo">เพิ่มภาพ</button>
<?php } 

$product_id=$_GET['id'];

$query = "SELECT p.*,g.* FROM product as p 
JOIN gallery as g ON  p.product_id = g.product_id
WHERE p.product_id ='$product_id'";
$result = mysql_query($query)or die ("Error in query: $query
query " . mysql_error());

$query2 = "SELECT p.*,g.* FROM product as p 
LEFT JOIN gallery as g ON  p.product_id = g.product_id
WHERE p.product_id ='$product_id'";
$result2 = mysql_query($query2)or die ("Error in query: $query2
query " . mysql_error());
$row_d = mysql_fetch_array($result2);

$i=1;
?>
<div class="main" style="margin-bottom:50px;">
    <h3 class="text-center">ข้อมูลสินค้า</h3>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>
                    <h5>ชื่อสินค้า</h5>
                </th>
                <th>
                    <h5>ประเภทสินค้า</h5>
                </th>
                <th>
                    <h5>รุ่น</h5>
                </th>
                <th>
                    <h5>รายละเอียดย่อ</h5>
                </th>
                <th>
                    <h5>รายละเอียด</h5>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="20%" scope="col">
                    <h5><?php echo $row_d['product_name']; ?></h5>
                </td>
                <td width="20%" scope="col">
                    <h5><?php echo $row_d['cate_sub_nameTH']; ?>||<?php echo $row_d['cate_sub_name']; ?></h5>
                </td>
                <td width="20%" scope="col">
                    <h5><?php $model =$row_d['product'];                   
                    if (empty($model)) {
                        echo "ไม่มีรุ่น";
                      }else{
                        echo  $row_d['cate_sub_name'];
                      }
                    ?>
                    </h5>
                </td>
                <td width="20%" scope="col">
                    <h5><?php echo $row_d['pic_name']; ?></h5>
                </td>
                <td width="20%" scope="col">
                    <h5><?php echo $row_d['pic_detail']; ?></h5>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="main" style="margin-bottom:50px;">
    <div class="img text-center">
        <h5>ภาพหลัก</h5>
        <img src="../admin/<?php echo $row_d['product_pic']; ?>" width="300px" alt=""
            style="border:solid  #FE5600 3px ; padding:15px;">
    </div>
</div>

<table class="table table-striped  table-responsive " id="example1" align="center">
    <h3 class="text-center">แกลอรี่</h3>
    <thead class="thead-dark">
        <tr class="info">
            <th width="20%" scope="col">ลำดับ</th>
            <th width="20%" class="text-nowrap" scope="col">รูปภาพ</th>
            <th width="20%" class="text-nowrap" scope="col">ชื่อรูป</th>
            <th width="20%" class="text-nowrap" scope="col">รายละเอียดรูปภาพ</th>
            <th width="20%" scope="col">Action</th>
        </tr>
    </thead>
    <?php while($row_p = mysql_fetch_array($result)) { ?>
    <tr>
        <th scope="row"><?php echo $i++ ?></th>
        <td><img src="<?php echo $row_p['gallery_pic']; ?>" width="100%" alt=""></td>
        <td><?php echo $row_p['pic_name']; ?></td>
        <td><?php echo $row_p['pic_detail']; ?></td>
        <td>
            <div class="d-flex">
                <a href="index.php?act=editgallery&gallery_id=<?php echo $row_p['gallery_id']; ?>&product_id=<?php echo $row_p['product_id']; ?>" class="btn btn-warning btn-sm"><i
                        class="fas fa-edit"></i></a><a
                    href="product_db.php?act=delete&id=<?php echo $row_p['product_id']; ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('ต้องการลบ Product ID : <?php echo $row_p['product_id']; ?>')"><i
                        class="fas fa-trash-alt"></i></a>
            </div>
        </td>
    </tr>
    <?php }  ?>
</table>

<!-- modal เพิ่มภาพ-->
<div class="modal fade" id="gall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มแกลอรี่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form action="gallery_db.php?act=add" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ชื่อรูป: <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="pic_name" id="" placeholder="--ชื่อรูปภาพ"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">รายละเอียดรูปภาพ: <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="pic_detail" id=""
                            placeholder="-รายละเอียดรูปภาพ" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">รูปภาพ: <span
                                class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gallery_pic"
                                    aria-describedby="inputGroupFileAddon01" accept="image/x-png,image/gif,image/jpeg"
                                    required onchange="readURL(this);">
                                <label class=" custom-file-label" for="inputGroupFile01">เลือกรูปภาพ</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $product_id ;?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-success btn-flat">บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>
