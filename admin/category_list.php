<?php

include('../config/config.php');  
$query = "SELECT * FROM category ORDER BY cate_id ASC";
$result = mysql_query($query)or die ("Error in query: $query
query " . mysql_error());
$i=1;
?>
<table class="table table-striped  table-responsive " id="example1" align="center">
    <thead class="thead-dark">
        <tr class="info">
            <th width="10%"scope="col">#</th>
            <th width="10%" class="text-nowrap" scope="col">Cate_id</th>
            <th width="20%" class="text-nowrap" scope="col">Cate_NameENG</th>
            <th width="20%" class="text-nowrap" scope="col">Cate_NameTH</th>
            <th width="20%" scope="col">Action</th>
        </tr>
    </thead>
    <?php while($row_p = mysql_fetch_array($result)) { ?>
    <tr>
        <th scope="row"><?php echo $i++ ?></th>
        <td><?php echo $row_p['cate_id']; ?></td>
        <td><?php echo $row_p['cate_name']; ?></td>
        <td><?php echo $row_p['cate_nameTH']; ?></td>
        <td>
            <div class="d-flex">
                <a href="category.php?act=edit&id=<?php echo $row_p['cate_id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a><a
                    href="category_db.php?act=delete&id=<?php echo $row_p['cate_id']; ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('ต้องการลบ Category ID : <?php echo $row_p['cate_id']; ?>')"><i class="fas fa-trash-alt"></i></a>
            </div>
        </td>
    </tr>
    <?php }  ?>
</table>