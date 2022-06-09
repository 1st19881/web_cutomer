<!DOCTYPE html>
<html lang="en">
<?php $munu = "product";
include('head.php') ;
?>
<style>
.btnpage {
    background-color: #fd7625;
    width: auto;
    color: white;
    margin: auto;
    padding: 10px;
    border-radius: -100px;
}

.btnpage:hover {
    background-color: #fd78;
    width: auto;
    color: black;
    margin: auto;
    padding: 10px;
    border-radius: 35px;
}
</style>

<body id="body">


    <!-- PHP -->
    <?php 
include('menu.php') ;
include('config/config.php') ;

//PHP5
// $querypd=mysql_query("SELECT COUNT(product_id) FROM product ");
// 	$row = mysql_fetch_row($querypd);

// queryproduct
$querypd=mysqli_query($conn,"SELECT COUNT(product_id) FROM product ");
	$row = mysqli_fetch_row($querypd);
 
	$rows = $row[0];
 
	$page_rows = 40;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 
 
	$last = ceil($rows/$page_rows);
 
	if($last < 1){
		$last = 1;
	}
 
	$pagenum = 1;
 
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}
 
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
 
	$nquery=mysqli_query($conn,"SELECT p.*,cs.* from  product as p
	JOIN category_sub as cs ON p.cate_sub_id=cs.cate_sub_id ORDER BY product_id 
	 $limit");
 
	$paginationCtrls = '';
 
	if($last != 1){
 
	if ($pagenum > 1) {
$previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btnpage">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btnpage">'.$i.'</a> &nbsp; ';
			}
	}
}
 
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
 
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btnpage ">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
 
if ($pagenum != $last) {
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btnpage ">Next</a> ';
}
	}

?>

    <?php
      $act = (isset($_GET['act'])? $_GET['act'] : '');
    //   $q = (isset($_GET['q'])? $_GET['q'] : '');
      if($act == 'show_type'){
        include('showtypeproduct.php') ;
        }
        // elseif ($q!='') 
        // {
        // include('search.php') ;
        // }elseif ($act =='p') 
        // {
        // include('search_price.php') ;
        // }
        else{
        include('product_show.php');
      }
    ?>



    <?php 
include('footer.php') ;
?>


</body>

</html>