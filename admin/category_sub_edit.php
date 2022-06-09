<?php
include('../config/config.php');

//debug value ที่ส่งมา จาก GET POST
//  echo '<pre>';
// 	print_r($_GET);
// 	echo '</pre>';
// 	exit;

//query ข้อมูล 
$id = $_GET["id"];
$sql = "SELECT * FROM category_sub WHERE cate_sub_id ='$id'";
$result2 = mysql_query($sql);
$row = mysql_fetch_array($result2) ;


include('../config/config.php');
$query_sub = "SELECT * FROM category ";
$result_sub = mysql_query($query_sub);
$i=1;

?>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-sm-2"> </div>
        <div class="col-sm-12" align="left">
            <h4 class="text-center"> Edit Category_Sub </h4>
        </div>
    </div>

    <form action="category_sub_db.php?act=edit" method="POST">
        <input type="text" name="id" value="<?php  echo $id; ?>">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category_SubNameEng: <span
                    class="text-danger">*</span></label>
            <input type="text" class="form-control" name="cate_sub_name" id="" placeholder="Compltecate_sub_nameEng"
                value="<?php echo $row['cate_sub_name'] ?>">
        </div>

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category_SubNameTh: <span
                    class="text-danger">*</span></label>
            <input type="text" class="form-control" name="cate_sub_nameTH" id="" placeholder="Compltecate_sub_nameTh"
                value="<?php echo $row['cate_sub_nameTH'] ?>">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category:</label>
            <input type="text" class="form-control" id="" value="<?php echo $row['cate_id'] ?> " disabled>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category </label>
            <select name="cate_id" class="form-control" required>
                <?php while(  $results_s =mysql_fetch_array ($result_sub)){?>
                <option value="<?php echo $results_s["cate_id"];?>">
                    (ID.<?php echo $results_s["cate_id"];?>) <?php echo $results_s["cate_name"] ; ?> ||
                    <?php echo $results_s["cate_nameTH"] ; ?>
                </option>
                <?php } ?>
            </select>
        </div>

</div>
<div class="modal-footer">
    <a href="category_sub.php" type="button" class="btn btn-danger btn-flat">ยกเลิก</a>
    <button type="submit" class="btn btn-success btn-flat">บันทึก</button>
</div>
</form>
</div>