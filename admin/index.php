<title>Product</title>
<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
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
    }elseif($act=="gallery"){
        echo '';  
    }else{?>
        <button type="button" class="btn btn-primary btn-flat my-3" data-toggle="modal" data-target="#exampleModal"
            data-whatever="@mdo">Add Product</button>
        <?php } 
    ?>

        <?php 
         include('../config/config.php');
        $query_sub = "SELECT * FROM category_sub ";
        $result_sub = mysqli_query($conn,$query_sub);
        $i=1;
        ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="product_db.php?act=add" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label">product_name: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_name" id=""
                                    placeholder="--CompleteName product" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">product_model: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_model" id=""
                                    placeholder="--CompleteName productmodel" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select  Category_Sub </label>
                                <select name="cate_sub_id" class="form-control" required>
                                    <?php while( $rs_sb =mysqli_fetch_array ($result_sub)){?>
                                    <option value="<?php echo $rs_sb["cate_sub_id"];?>">
                                        ID:
                                        <?php echo $rs_sb["cate_sub_id"] ; ?> .
                                        <?php echo $rs_sb["cate_sub_name"] ; ?> ||
                                        <?php echo $rs_sb["cate_sub_nameTH"] ; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Product_Detail: <span
                                        class="text-danger">*</span></label>
                                <textarea name="product_detail" id="detail1" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Product_Detailsub: <span
                                        class="text-danger">*</span></label>
                                <textarea name="product_detail_sub" id="detail" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Image: <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="product_pic"
                                            aria-describedby="inputGroupFileAddon01"
                                            accept="image/x-png,image/gif,image/jpeg" required onchange="readURL(this);">
                                        <label class=" custom-file-label" for="inputGroupFile01">Choose Img</label>
                                    </div>
                                </div>
                                <br>
                                <img id="blah" src="#" alt="your image" width="200px" />
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
            include('product_edit.php');
            }
            else if($act=='gallery'){
                include('add_gall.php');
                }
            else{
            include('product_list.php');
            }
            ?>
</section>
<!-- /.content -->

<?php include('footer.php'); ?>