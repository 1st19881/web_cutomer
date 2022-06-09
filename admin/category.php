<title>Category</title>
<?php include("header.php"); 
$menu ="category";
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
            data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เพิ่มหมวดหมู่หลัก</button>
        <?php } 
   ?>

<?php
 $nav="category";

$query_cat = "SELECT * FROM category ";
$result_cat = mysql_query($query_cat);
$i=1;
?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="category_db.php?act=add" method="POST" ">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Category_NameEng: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="cate_name" id=""
                                    placeholder="ComplteNameEng" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Category_NameTh: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="cate_nameTH" id=""
                                    placeholder="ComplteNameTh" required>
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
            include('category_edit.php');
            }
            else{
            include('category_list.php');
            }
            ?>
</section>
<!-- /.content -->

<?php include('footer.php'); ?>