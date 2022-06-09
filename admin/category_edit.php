<?php
include('../config/config.php');

//debug value ที่ส่งมา จาก GET POST
//  echo '<pre>';
// 	print_r($_GET);
// 	echo '</pre>';
// 	exit;

//query ข้อมูล 
$id = $_GET["id"];
$sql = "SELECT * FROM category WHERE cate_id ='$id'";
$result2 = mysql_query($sql);
$row = mysql_fetch_array($result2) ;
?>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-sm-2"> </div>
        <div class="col-sm-12" align="left">
            <h4 class="text-center"> Edit Category </h4>
        </div>
    </div>

    <form action="category_db.php?act=edit" method="POST">
        <input type="hidden"  name="id" value="<?php  echo $id; ?>">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category_NameEng: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="cate_name" id="" placeholder="ComplteNameEng"
                value="<?php echo $row['cate_name'] ?>">
        </div>

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category_NameTH: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="cate_nameTH" id="" placeholder="ComplteNameTH"
                value="<?php echo $row['cate_nameTH'] ?>">
        </div>

</div>
<div class="modal-footer">
    <a href="category.php" type="button" class="btn btn-danger btn-flat" >ยกเลิก</a>
    <button type="submit" class="btn btn-success btn-flat">บันทึก</button>
</div>
</form>
</div>