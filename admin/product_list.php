<?php

include('../config/config.php');  
$query = "SELECT p.product_name,p.product_model,p.product_pic,c.cate_name,c.cate_nameTH FROM product as p 
JOIN   category as c ON p.cate_sub_id=c.cate_id ";
$result = mysql_query($query)or die ("Error in query: $query
query " . mysql_error());
$i=1;
?>
<table class="table table-striped  table-responsive " id="example1" align="center">
    <thead class="thead-dark">
        <tr class="info">
            <th width="10%"scope="col">#</th>
            <th width="10%" class="text-nowrap" scope="col">Product</th>
            <th width="15%" class="text-nowrap" scope="col">Model</th>
            <th width="10%" class="text-nowrap" scope="col">Image</th>
            <th width="15%" scope="col">category</th>
            <th width="15%" scope="col">Name__TH</th>
            <th width="15%" scope="col">Action</th>
        </tr>
    </thead>
    <?php while($row_p = mysql_fetch_array($result)) { ?>
    <tr>
        <th scope="row"><?php echo $i++ ?></th>
        <td><?php echo $row_p['product_name']; ?></td>
        <td ><span class="badge badge-success" style="padding:7px;"><?php echo $row_p['product_model']; ?></span></td>
        <td><img src="../<?php echo $row_p['product_pic']; ?>" width="100%" alt=""></td>
        <td><?php echo $row_p['cate_name']; ?></td>
        <td><?php echo $row_p['cate_nameTH']; ?></td>
        <td>
            <div class="d-flex">
                <a href="index.php?act=edit&id=<?php echo $row_p['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a><a
                    href="product_db.php?act=delete&id=<?php echo $row_p['id']; ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('ต้องการลบสินค้า ID : <?php echo $row_p['id']; ?>')"><i class="fas fa-trash-alt"></i></a>
            </div>
        </td>
    </tr>
    <?php }  ?>
</table>