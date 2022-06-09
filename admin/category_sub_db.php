<?php  
header('Content-Type: text/html; charset=UTF-8');
 include('../config/config.php'); 

//  echo '<pre>';
// 	print_r($_POST);
// 	echo '</pre>';
// 	exit;

//เพิ่มข้อมูล Insert category_sub
	$act = (isset($_GET['act']) ? $_GET['act'] : '');
		if($act=='add'){

		$cate_sub_name = $_POST['cate_sub_name'];	
        $cate_sub_nameTH = $_POST['cate_sub_nameTH'];	
        $cate_id = $_POST['cate_id'];	

		$sqladd="INSERT INTO category_sub (	cate_sub_name,cate_sub_nameTH,cate_id)VALUES('$cate_sub_name','$cate_sub_nameTH','$cate_id')";
		$result = mysql_query($sqladd)or die ("Error in query: $sqladd " . mysql_error());
		mysql_close($conn);
		echo '
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		';		
		if($result){
			echo '
			<script>
			   setTimeout(function() {
				swal({
					title: "เพิ่มสำเร็จ",
					type: "success"
				}, function() {
					window.location = "category_sub.php";
				});
			}, 100);
		</script>
		';
	}
	else{
        echo '
        <script>
           setTimeout(function() {
            swal({
                title: "ไม่สำเร็จ",
                type: "danger"
            }, function() {
                window.location = "category_sub.php";
            });
        }, 100);
    </script>
    ';
	}
}

//แก้ไขข้อมูล update category_sub
$act = (isset($_GET['act']) ? $_GET['act'] : '');
		if($act=='edit'){
			// echo '<pre>';
			// print_r($_POST);
			// echo '</pre>';
			// print("แก้ไข");
			// exit;

		$id = $_POST['id'];
		$cate_sub_name =$_POST['cate_sub_name']	;
		$cate_sub_nameTH =$_POST['cate_sub_nameTH']	;
		$cate_id =$_POST['cate_id']	;

		$sqlupdate = "UPDATE category_sub SET  
			cate_sub_name='$cate_sub_name',
			cate_sub_nameTH='$cate_sub_nameTH',
			cate_id='$cate_id'
			WHERE cate_sub_id='$id' ";
		$resultupdate = mysql_query($sqlupdate) or die ("Error in query: $sqlupdate " . mysql_error());
		mysql_close($conn); 

				echo '
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		';		
		if($resultupdate){
		echo '
		<script>
			setTimeout(function() {
			swal({
			title: "แก้ไขสำเร็จ",
			type: "success"
			}, function() {
			window.location = "category_sub.php";
			});
		}, 100);
		</script>
		';
		}
		else{
			echo '
			<script>
				setTimeout(function() {
				swal({
				title: "ไม่สำเร็จ",
				type: "danger"
				}, function() {
				window.location = "category_sub.php";
				});
			}, 100);
			</script>
			';
		}
	}	

	//ลบข้อมูล
	$act = (isset($_GET['act']) ? $_GET['act'] : '');
		if($act=='delete'){

			// echo '<pre>';
			// print_r($_GET);
			// echo '</pre>';
			// print("ลบ");
			// exit;

	$id = $_GET['id'];


		$sql_del= "DELETE FROM category_sub WHERE cate_sub_id='$id' ";
		$result_del = mysql_query($sql_del) or die ("Error in query: $sql_del " . mysql_error());


		echo '
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		';		
		if($result_del){
		echo '
		<script>
			setTimeout(function() {
			swal({
			title: "ลบสำเร็จ",
			type: "success"
			}, function() {
			window.location = "category.php";
			});
		}, 100);
		</script>
		';
		}
		else{
		echo "<script type='text/javascript'>";
		echo "alert('ลบไม่สำเร็จ');";
		echo "window.location = 'category.php' ";
		echo "</script>";
		}
	}
?>