<?php   include('../config/config.php'); 

date_default_timezone_set('Asia/Bangkok');

    // echo '<pre>';
	// print_r($_POST);
    // print_r($_FILES);
	// echo '</pre>';
	// exit;

//เพิ่มข้อมูล
	$act = (isset($_GET['act']) ? $_GET['act'] : '');
		if($act=='add'){

    $pic_name = $_POST['pic_name'];	
    $pic_detail = $_POST['pic_detail'];	
    $product_id = $_POST['product_id'];

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$product_pic = (isset($_REQUEST['gallery_pic']) ? $_REQUEST['gallery_pic'] : '');
	$upload=$_FILES['gallery_pic']['name'];
	if($upload !='') { 

		$path="images/gallery/";
		$type = strrchr($_FILES['gallery_pic']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="images/gallery/".$newname;
		move_uploaded_file($_FILES['gallery_pic']['tmp_name'],$path_copy);  
	}

		$sqladd="INSERT INTO gallery(gallery_pic,product_id,pic_name,pic_detail)
        VALUES
        ('$path$newname',
        '$product_id',
        '$pic_name',
        '$pic_detail')";
		$result = mysql_query($sqladd)or die ("Error in query: $sqladd
		query " . mysql_error());
		mysql_close($conn);

// exit;
		echo '
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		';		
		if($result){
			echo "
			<script>
			   setTimeout(function() {
				swal({
					title: 'เพิ่มสำเร็จ',
					type: 'success'
				}, function() {
					window.location = 'index.php?act=gallery&id=$product_id';
				});
			}, 100);
		</script>
		";
	}
	else{
		echo "
			<script>
			   setTimeout(function() {
				swal({
					title: 'ไม่สำเร็จ',
					type: 'danger'
				}, function() {
					window.location = 'index.php?act=gallery&id=$product_id';
				});
			}, 100);
		</script>
		";
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
		$gallery_id = $_POST['gallery_id'];	
		$gallery_pic2 = $_POST['gallery_pic2'];	
		$pic_name = $_POST['pic_name'];
		$pic_detail = $_POST['pic_detail'];

		$date1 = date("Ymd_His");
		$numrand = (mt_rand());
		$product_pic = (isset($_REQUEST['gallery_pic']) ? $_REQUEST['gallery_pic'] : '');
		$upload=$_FILES['gallery_pic']['name'];
		if($upload !='') { 
	
			$path="images/gallery/";
			$type = strrchr($_FILES['gallery_pic']['name'],".");
			$newname =$numrand.$date1.$type;
			$path_copy=$path.$newname;
			$path_link="images/gallery/".$newname;
			move_uploaded_file($_FILES['gallery_pic']['tmp_name'],$path_copy);  
		}else{
			$newname=$gallery_pic2;	
		}

		$sqlupdate = "UPDATE gallery SET  
			pic_name='$pic_name',
			gallery_pic='$path$newname',
			pic_detail='$pic_detail'
			WHERE gallery_id='$gallery_id' ";
		$resultupdate = mysql_query($sqlupdate) or die ("Error in query: $sqlupdate " . mysql_error());
		mysql_close($conn); 

		echo '
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
		';		
		if($resultupdate){
			echo "
			<script>
			   setTimeout(function() {
				swal({
					title: 'เพิ่มสำเร็จ',
					type: 'success'
				}, function() {
					window.location = 'index.php?act=gallery&id=$product_id';
				});
			}, 100);
		</script>
		";
		}
		else{
			echo "
			<script>
			   setTimeout(function() {
				swal({
					title: 'ไม่สำเร็จ',
					type: 'danger'
				}, function() {
					window.location = 'index.php?act=gallery&id=$product_id';
				});
			}, 100);
		</script>
		";
		}	
	}
	exit;
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