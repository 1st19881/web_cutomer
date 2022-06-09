<?php

include('../config/config.php');  
$query = "SELECT cs.*,c.cate_name,c.cate_nameTH FROM category_sub  as cs
JOIN category as c ON cs.cate_id = c.cate_id ";
$result = mysql_query($query)or die ("Error in query: $query
query " . mysql_error());
$i=1;
?>
<table class="table table-striped  table-responsive " id="example1" align="center">
    <thead class="thead-dark">
        <tr class="info">
            <th width="10%"scope="col">#</th>
            <th width="20%" class="text-nowrap" scope="col">หมวดหมู่หลัก</th>
            <th width="20%" class="text-nowrap" scope="col">หมวดหมู่ย่อยภาษาอังกฤษ	</th>
            <th width="20%" class="text-nowrap" scope="col">หมวดหมู่ย่อยภาษาไทย</th>
            <th width="20%" scope="col">จัดการ</th>
        </tr>
    </thead>
    <?php while($row_p = mysql_fetch_array($result)) { ?>
    <tr>
        <th scope="row"><?php echo $i++ ?></th>
        <td><?php echo $row_p['cate_name']; ?> <br><?php echo $row_p['cate_nameTH']; ?></td>
        <td><?php echo $row_p['cate_sub_name']; ?></td>
        <td><?php echo $row_p['cate_sub_nameTH']; ?></td>
        <td>
            <div class="d-flex">
                <a href="category_sub.php?act=edit&id=<?php echo $row_p['cate_sub_id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a><a
                    href="category_sub_db.php?act=delete&id=<?php echo $row_p['cate_sub_id']; ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('ต้องการลบ Category_Sub ID : <?php echo $row_p['cate_sub_id']; ?>')"><i class="fas fa-trash-alt"></i></a>
            </div>
        </td>
    </tr>
    <?php }  ?>
</table>