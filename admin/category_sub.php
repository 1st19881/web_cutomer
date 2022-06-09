<title>Category_sub</title>
<?php include("header.php"); 
$menu ="category_sub";
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container">
        <?php 
  $act = (isset($_GET['act']) ? $_GET['act'] : '');
    if($act=="add"){
      echo '';
    }elseif($act=="edit"){
        echo '';
    }elseif($act=="delete"){
        echo '';  
    }else{?>
        <button type="button" class="btn  btn-flat my-3" style="background-color:#fd7625;color:white"
            data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เพิ่มหมวดหมู่ย่อย</button>
        <?php } 
   ?>

<?php include('../config/config.php');
$query_cat = "SELECT * FROM category ";
$result_cat = mysql_query($query_cat);
$i=1;
?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มหมวดหมู่ย่อย</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="category_sub_db.php?act=add" method="POST" ">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">หมวดหมู่ย่อยภาษาอังกฤษ: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="cate_sub_name" id=""
                                    placeholder="ComplteNameEng" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">หมวดหมู่ย่อยภาษาไทย: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="cate_sub_nameTH" id=""
                                    placeholder="ComplteNameTh" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">หมวดหมู่หลัก </label>
                                <select name="cate_id" class="form-control" required>
                                    <?php while(  $results_c =mysql_fetch_array ($result_cat)){?>
                                    <option value="<?php echo $results_c["cate_id"];?>">
                                        (ID.<?php echo $results_c["cate_id"];?>) <?php echo $results_c["cate_name"] ; ?> || <?php echo $results_c["cate_nameTH"] ; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success btn-flat">บันทึก</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $act = (isset($_GET['act']) ? $_GET['act'] : '');
            if($act=='edit'){
            include('category_sub_edit.php');
            }
            else{
            include('category_sub_list.php');
            }
            ?>
</section>
<!-- /.content -->

<?php include('footer.php'); ?>