<?php
include('../config/config.php');  

$id = $_GET["id"];

$sql = "SELECT * FROM product WHERE product_id='$id'";
$result2 = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);


$query_sub = "SELECT * FROM category_sub ";
$result_sub = mysqli_query($conn,$query_sub);

?>
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
<div class="col-md-12">
    <div class="form-group">
        <div class="col-sm-2"> </div>
        <div class="col-sm-12" align="left">
            <h4 class="text-center"> Edit Product </h4>
        </div>
    </div>

    <form action="product_db.php?act=edit" method="POST" enctype="multipart/form-data">
        <input type="text" name="product_pic2" value="<?php  echo $row['product_pic'] ?>">
        <input type="text" name="product_id" value="<?php  echo $id; ?>">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">product_name: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="product_name" value="<?php echo $row["product_name"];?>" id="" placeholder="--CompleteName product"
                required>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">product_model: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="product_model" value="<?php echo $row["product_model"];?>" id="" placeholder="--CompleteName productmodel"
                required>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category_Sub:</label>
            <input type="text" class="form-control" value="<?php echo $row["cate_sub_id"];?>" readonly>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category_Sub  <span class="text-danger">*</span> </label>
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
            <textarea name="product_detail" id="detailx" cols="30" rows="5" class="form-control"><?php echo $row["product_detail"];?></textarea>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Product_Detailsub: <span
                    class="text-danger">*</span></label>
            <textarea name="product_detail_sub" id="detailz" cols="30" rows="5" class="form-control"><?php echo $row["product_detail_sub"];?></textarea>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image: <span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="product_pic"
                        aria-describedby="inputGroupFileAddon01" accept="image/x-png,image/gif,image/jpeg" required
                        onchange="readURL(this);">
                    <label class=" custom-file-label" for="inputGroupFile01">Choose Img</label>
                </div>
            </div>
            <br>
            <img src="../admin/<?php echo $row['product_pic']; ?>" width="200px" alt="">
        </div>
</div>
<div class="modal-footer">
    <a href="index.php" type="button" class="btn btn-danger btn-flat">ยกเลิก</a>
    <button type="submit" class="btn btn-success btn-flat">บันทึก</button>
</div>
</form>
</div>

<script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
  <script>
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('detailx');
  function CKupdate() {
      for (instance in CKEDITOR.instances)
          CKEDITOR.instances[instance].updateElement();
  }
</script>
<script>
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('detailz');
  function CKupdate() {
      for (instance in CKEDITOR.instances)
          CKEDITOR.instances[instance].updateElement();
  }
</script>
