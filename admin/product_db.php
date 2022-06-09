<?php   include('../config/config.php'); 

date_default_timezone_set('Asia/Bangkok');

    echo '<pre>';
	print_r($_POST);
    print_r($_FILES);
	echo '</pre>';
	exit;

//เพิ่มข้อมูล
	$act = (isset($_GET['act']) ? $_GET['act'] : '');
		if($act=='add'){

		$product_name = $_POST['product_name'];	
		$product_model = $_POST['product_model'];	
		$product_detail_sub = $_POST['product_detail_sub'];
		$product_detail = $_POST['product_detail'];	
		$cate_sub_id = $_POST['cate_sub_id'];		

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$product_pic = (isset($_REQUEST['product_pic']) ? $_REQUEST['product_pic'] : '');
	$upload=$_FILES['product_pic']['name'];
	if($upload !='') { 

		$path="images/product/";
		$type = strrchr($_FILES['product_pic']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="images/product/".$newname;
		move_uploaded_file($_FILES['product_pic']['tmp_name'],$path_copy);  
	}

		$sqladd="INSERT INTO product(product_name,product_model,product_detail_sub,product_detail,product_pic,cate_sub_id)VALUES('$product_name','$product_model','$product_detail_sub','$product_detail','$path$newname','$cate_sub_id')";
		$result = mysql_query($sqladd)or die ("Error in query: $sqladd
		query " . mysql_error());
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
					window.location = "index.php";
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
				window.location = "index.php";
			});
		}, 100);
	</script>
	';
	}
}

//แก้ไขข้อมูล
$act = (isset($_GET['act']) ? $_GET['act'] : '');
		if($act=='edit'){

			// echo '<pre>';
			// print_r($_POST);
			// print_r($_FILES);
			// echo '</pre>';
			// print("แก้ไข");
			// exit;

		$product_id = $_POST['product_id'];	
		$product_pic2 = $_POST['product_pic2'];	
		$product_name = $_POST['product_name'];	
		$product_model = $_POST['product_model'];
		$product_detail_sub = $_POST['product_detail_sub'];
		$product_detail = $_POST['product_detail'];
		$cate_sub_id = $_POST['cate_sub_id'];

		$date1 = date("Ymd_His");
		$numrand = (mt_rand());
		$product_pic = (isset($_REQUEST['product_pic']) ? $_REQUEST['product_pic'] : '');
		$upload=$_FILES['product_pic']['name'];
		if($upload !='') { 
	
			$path="images/product/";
			$type = strrchr($_FILES['product_pic']['name'],".");
			$newname =$numrand.$date1.$type;
			$path_copy=$path.$newname;
			$path_link="images/product/".$newname;
			move_uploaded_file($_FILES['product_pic']['tmp_name'],$path_copy);  
		}else{
			$newname=$product_pic2;	
		}

		$sqlupdate = "UPDATE product SET  
			product_name='$product_name',
			product_pic='$path$newname',
			product_model='$product_model',
			product_detail_sub='$product_detail_sub',
			product_detail='$product_detail',
			cate_sub_id='$cate_sub_id'
			WHERE product_id='$product_id' ";
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
			window.location = "index.php";
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
				window.location = "index.php";
				});
			}, 100);
			</script>
			';
		}	
	}
	//ลบข้อมูล
	//ลบข้อมูล
	$act = (isset($_GET['act']) ? $_GET['act'] : '');
		if($act=='delete'){
			// echo '<pre>';
			// print_r($_GET);
			// echo '</pre>';
			// print("ลบ");
			// exit;

	$id = $_GET['id'];
	// $sql5="SELECT*FROM product WHERE id='$id' "; 
	// $resault5 = mysql_query($sql5);
	// $row = mysql_fetch_array($resault5 );

	// $path="image-main/"; 
	// $path_img="image/";
	// $path_pdf="pdf/";

	// $newname =$row['img_main']; 	
	// $newname2 =$row['img']; 
	// $newname3 =$row['file_pdf']; 

			
	// 	$file=$path.$newname;
	// 	if (unlink($file)){  
	// 	echo ("deleted $file");
	// 	}else{
	// 	echo ("error");
	// 	}
	// $file2=$path_img.$newname2;
	// 	if (unlink($file2)){  
	// 	echo ("deleted $file2");
	// 	}else{
	// 	echo ("error");
	// 	}
	// $file3=$path_pdf.$newname3;
	// 	if (unlink($file3)){  
	// 	echo ("deleted $file3");
	// 	}else{
	// 	echo ("error");
	// 	}

		$sql_del= "DELETE FROM product WHERE product_id='$id' ";
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
			window.location = "index.php";
			});
		}, 100);
		</script>
		';
		}else{
			echo '
		<script>
			setTimeout(function() {
			swal({
			title: "ลบสำเร็จ",
			type: "danger"
			}, function() {
			window.location = "index.php";
			});
		}, 100);
		</script>
		';
		}
		
	}
?>