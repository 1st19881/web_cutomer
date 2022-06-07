<?php

include('../config/config.php'); 
// PHP5 
// $query = "SELECT p.product_name,p.product_model,p.product_pic,c.cate_name,c.cate_nameTH FROM product as p 
// JOIN   category as c ON p.cate_sub_id=c.cate_id ";
// $result = mysql_query($query)or die ("Error in query: $query
// query " . mysql_error());

// PHP7
$product_id=$_GET['id'];
$query = "SELECT * FROM gallery WHERE product_id='$product_id'";

$result = mysqli_query($conn,$query)or die ("Error in query: $query
query " . mysqli_error());

$i=1;
?>
<table class="table table-striped  table-responsive " id="example1" align="center">
    <thead class="thead-dark">
        <tr class="info">
            <th width="20%"scope="col">#</th>
            <th width="20%" class="text-nowrap" scope="col">Gallery_id</th>
            <th width="20%" class="text-nowrap" scope="col">Gallery_pic</th>
            <th width="20%" class="text-nowrap" scope="col">Name</th>
            <th width="20%" class="text-nowrap" scope="col">Detail</th>
            <th width="20%" scope="col">Action</th>
        </tr>
    </thead>
    <?php while($row_p = mysqli_fetch_array($result)) { ?>
    <tr>
        <th scope="row"><?php echo $i++ ?></th>
        <td><?php echo $row_p['gallery_id']; ?></td>
        <td><img src="../admin/<?php echo $row_p['gallery_pic']; ?>" width="100%" alt=""></td>
        <td ><?php echo $row_p['pic_name']; ?></td>
        <td><?php echo $row_p['pic_detail']; ?></td>
        <td>
            <div class="d-flex">
                <a href="index.php?act=edit&id=<?php echo $row_p['product_id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a><a
                    href="product_db.php?act=delete&id=<?php echo $row_p['product_id']; ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('ต้องการลบ Product ID : <?php echo $row_p['product_id']; ?>')"><i class="fas fa-trash-alt"></i></a>
            </div>
        </td>
    </tr>
    <?php }  ?>
</table>