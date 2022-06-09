<?php

include('../config/config.php'); 
// PHP5 
// $query = "SELECT p.product_name,p.product_model,p.product_pic,c.cate_name,c.cate_nameTH FROM product as p 
// JOIN   category as c ON p.cate_sub_id=c.cate_id ";
// $result = mysql_query($query)or die ("Error in query: $query
// query " . mysql_error());

// PHP7
$query = "SELECT p.*,cb.* FROM product as p 
JOIN   category_sub as cb ON p.cate_sub_id=cb.cate_sub_id ";
$result = mysql_query($query)or die ("Error in query: $query
query " . mysql_error());

$i=1;
?>
<table class="table table-striped  table-responsive " id="example1" align="center">
    <thead class="thead-dark">
        <tr class="info">
            <th width="10%"scope="col">ลำดับ</th>
            <th width="20%" class="text-nowrap" scope="col">ชื่อสินค้า</th>
            <th width="20%" class="text-nowrap" scope="col">ประเภทสินค้า</th>
            <th width="15%" class="text-nowrap" scope="col">รุ่น</th>
            <th width="15%" class="text-nowrap" scope="col">รูปภาพ</th>
            <th width="30%" scope="col">จัดการ</th>
        </tr>
    </thead>
    <?php while($row_p = mysql_fetch_array($result)) { ?>
    <tr>
        <th scope="row"><?php echo $i++ ?></th>
        <td><?php echo $row_p['product_name']; ?></td>
        <td><?php echo $row_p['cate_sub_name']; ?></td>
        <td ><?php echo $row_p['product_model']; ?></td>
        <td><img src="../admin/<?php echo $row_p['product_pic']; ?>" width="100%" alt=""></td>
        <td>
            <div class="d-flex"> <a href="index.php?act=gallery&id=<?php echo $row_p['product_id']; ?>" class="btn btn-success btn-sm">เพิ่มแกลอรี่</a>
                <a href="index.php?act=edit&id=<?php echo $row_p['product_id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a><a
                    href="product_db.php?act=delete&id=<?php echo $row_p['product_id']; ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('ต้องการลบ Product ID : <?php echo $row_p['product_id']; ?>')"><i class="fas fa-trash-alt"></i></a>
            </div>
        </td>
    </tr>
    <?php }  ?>
</table>