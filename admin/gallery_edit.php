<?php
include('../config/config.php');  

$gallery_id=$_GET['gallery_id'];
$product_id=$_GET['product_id'];
$query_editg = "SELECT * FROM gallery WHERE gallery_id='$gallery_id' ";
$rowgg = mysql_query($query_editg) or die(mysql_error());
$rowfet = mysql_fetch_array($rowgg);

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
            <h4 class="text-center"> แก้ไขรูปภาพแกลอรี่ (ID.<?php  echo $gallery_id; ?>) </h4>
        </div>
    </div>

    <form action="gallery_db.php?act=edit" method="POST" enctype="multipart/form-data">
        <input type="text" name="gallery_pic2" value="<?php  echo $rowfet['gallery_pic'] ?>">
        <input type="text" name="product_id" value="<?php  echo $product_id; ?>">
        <input type="text" name="gallery_id" value="<?php  echo $gallery_id; ?>">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">ชื่อรูปภาพ: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pic_name" value="<?php echo $rowfet["pic_name"];?>" id="" placeholder="--CompleteName productmodel"
                required>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">รายละเอียดรูปภาพ: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pic_detail" value="<?php echo $rowfet["pic_detail"];?>" id="" placeholder="--CompleteName productmodel"
                required>
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image: <span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gallery_pic"
                        aria-describedby="inputGroupFileAddon01" accept="image/x-png,image/gif,image/jpeg" 
                        onchange="readURL(this);">
                    <label class=" custom-file-label" for="inputGroupFile01">Choose Img</label>
                </div>
            </div>
            <br>
            <img src="<?php echo $rowfet['gallery_pic']; ?>" width="200px" alt="">
        </div>
</div>
<div class="modal-footer">
    <a href="index.php?act=gallery&id=<?php  echo $product_id; ?>" type="button" class="btn btn-danger btn-flat">ยกเลิก</a>
    <button type="submit" class="btn btn-success btn-flat">บันทึก</button>
</div>
</form>
</div>
