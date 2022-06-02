<?php
include('../connection/connect.php');  

$id = $_GET["id"];

$sql = "SELECT * FROM product WHERE id=$id";
$result2 = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
?>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-sm-2"> </div>
        <div class="col-sm-12" align="left">
            <h4 class="text-center"> Edit Product </h4>
        </div>
    </div>

    <form action="product_db.php?act=edit" method="POST" enctype="multipart/form-data">
        <input type="text" name="img_main2" value="<?php  echo $row['img_main'] ?>">
        <input type="text"  name="img2" value="<?php  echo $row['img'] ?>">
        <input type="text" name="file_pdf2" value="<?php  echo $row['file_pdf'] ?>">
        <input type="text"  name="id" value="<?php  echo $id; ?>">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">ชื่อสินค้า: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="product_name" id="" placeholder="กรอชื่อสินค้า"
                value="<?php echo $row['product_name'] ?>">
        </div>

        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">ไฟล์ภาพหลัก: <span
                                class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img_main"
                                    aria-describedby="inputGroupFileAddon01" accept="image/x-png,image/gif,image/jpeg">
                                <label class="custom-file-label" for="inputGroupFile01">Choose Img_main</label>
                            </div>
                        </div>
                        <img src="image-main/<?php  echo $row['img_main'] ?>" alt="" width="150px" alt="">
                    </div>
                </div>
                <div class="col">
                <div class="form-group">
                <label for="message-text" class="col-form-label">ไฟล์ภาพย่อย: <span
                                class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img"
                                    aria-describedby="inputGroupFileAddon01" accept="image/x-png,image/gif,image/jpeg">
                                <label class="custom-file-label" for="inputGroupFile01">Choose Img</label>
                            </div>
                        </div>
                        <img src="image/<?php  echo $row['img'] ?>" alt="" width="150px" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="message-text" class="col-form-label">ไฟล์ PDF: <span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_pdf"
                        aria-describedby="inputGroupFileAddon01" accept=".pdf">
                    <label class="custom-file-label" for="inputGroupFile01">Choose File_PDF</label>
                </div>
            </div>
            <a href="pdf/<?php  echo $row['file_pdf'] ?>" target="_blank"><?php  echo $row['file_pdf'] ?></a>
        </div>
</div>
<div class="modal-footer">
    <a href="index.php" type="button" class="btn btn-danger btn-flat" >ยกเลิก</a>
    <button type="submit" class="btn btn-success btn-flat">บันทึก</button>
</div>
</form>
</div>