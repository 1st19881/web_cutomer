<?php   include('../connection/connect.php'); 
date_default_timezone_set('Asia/Bangkok');
$date1 = date("Ymd_His");
$numrand = (mt_rand());

//  echo '<pre>';
// 	print_r($_POST);
//  print_r($_FILES);
// 	echo '</pre>';
// 	exit;
//เพิ่มข้อมูล
	$act = (isset($_GET['act']) ? $_GET['act'] : '');
		if($act=='add'){

		$product_name = $_POST['product_name'];	

		$img_main =(isset($_POST['img_main']) ? $_POST['img_main'] :'');
		$upload=$_FILES['img_main']['name'];
		if($upload !='') { 
			$path="image-main/";
			$type = strrchr($_FILES['img_main']['name'],".");
			$newname =$numrand.$date1.$type;
			$path_copy=$path.$newname;
			$path_link="image-main/".$newname;
			move_uploaded_file($_FILES['img_main']['tmp_name'],$path_copy);  
		}else{
			$newname='';
		}
		$img = (isset($_POST['img']) ? $_POST['img'] : '');
		$upload=$_FILES['img']['name'];
		if($upload !='') { 
			$path="image/";
			$type = strrchr($_FILES['img']['name'],".");
			$newname2 =$numrand.$date1.$type;
			$path_copy=$path.$newname2;
			$path_link="image/".$newname2;
			move_uploaded_file($_FILES['img']['tmp_name'],$path_copy);  
		}else{
			$newname2='';
		}
		
	    $file_pdf = (isset($_POST['file_pdf']) ? $_POST['file_pdf'] : '');
		$upload=$_FILES['file_pdf']['name'];
		if($upload !='') { 

			$path="pdf/";
			$type = strrchr($_FILES['file_pdf']['name'],".");
			$newname3 =$numrand.$date1.$type;
			$path_copy=$path.$newname3;
			$path_link="pdf/".$newname3;
			move_uploaded_file($_FILES['file_pdf']['tmp_name'],$path_copy);  
		}else{
			$newname3='';
		}
		$sqladd="INSERT INTO product (product_name,img_main,img,file_pdf)VALUES('$product_name','$newname','$newname2','$newname3')";
		$result = mysqli_query($conn, $sqladd)or die ("Error in query: $sqladd
		query " . mysqli_error());
		mysqli_close($conn);
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
					text: "เพิ่มสินค้าสำเร็จ",
					type: "success"
				}, function() {
					window.location = "index.php";
				});
			}, 100);
		</script>
		';
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สำเร็จ');";
	echo "window.location = 'index.php' ";
	echo "</script>";
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

		$id = $_POST['id'];	
		$product_name = $_POST['product_name'];	
		$img_main2 = $_POST['img_main2'];
		$img2 = $_POST['img2'];
		$file_pdf2 = $_POST['file_pdf2'];

		$img_main = (isset($_POST['img_main']) ? $_POST['img_main'] : '');
		$upload=$_FILES['img_main']['name'];
		if($upload !='') { 
	
			$path="image-main/";
			$type = strrchr($_FILES['img_main']['name'],".");
			$newname =$numrand.$date1.$type;
			$path_copy=$path.$newname;
			$path_link="image-main/".$newname;
			move_uploaded_file($_FILES['img_main']['tmp_name'],$path_copy);  
		}else{
			$newname=$img_main2;
		}

		$img = (isset($_POST['img']) ? $_POST['img'] : '');
		$upload=$_FILES['img']['name'];
		if($upload !='') { 
	
			$path="image/";
			$type = strrchr($_FILES['img']['name'],".");
			$newname2 =$numrand.$date1.$type;
			$path_copy=$path.$newname2;
			$path_link="image/".$newname2;
			move_uploaded_file($_FILES['img']['tmp_name'],$path_copy);  
		}else{
			$newname2=$img2;
		}
		
		$file_pdf = (isset($_POST['file_pdf']) ? $_POST['file_pdf'] : '');
		$upload=$_FILES['file_pdf']['name'];
		if($upload !='') { 
	
			$path="pdf/";
			$type = strrchr($_FILES['file_pdf']['name'],".");
			$newname3 =$numrand.$date1.$type;
			$path_copy=$path.$newname3;
			$path_link="pdf/".$newname3;
			move_uploaded_file($_FILES['file_pdf']['tmp_name'],$path_copy);  
		}else{
			$newname3=$file_pdf2;
		}

		$sqlupdate = "UPDATE product SET  
			product_name='$product_name',
			img_main='$newname',
			img='$newname2',
			file_pdf='$newname3'
			WHERE id='$id' ";
		$resultupdate = mysqli_query($conn, $sqlupdate) or die ("Error in query: $sqlupdate " . mysqli_error());
		mysqli_close($conn); 

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
			text: "แก้ไขสินค้าสำเร็จ",
			type: "success"
			}, function() {
			window.location = "index.php";
			});
		}, 100);
		</script>
		';
		}
		else{
		echo "<script type='text/javascript'>";
		echo "alert('แก้ไขไม่สำเร็จ');";
		echo "window.location = 'index.php' ";
		echo "</script>";
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
	$sql5="SELECT*FROM product WHERE id='$id' "; 
	$resault5 = mysqli_query($conn, $sql5);
	$row = mysqli_fetch_array($resault5 );

	$path="image-main/"; 
	$path_img="image/";
	$path_pdf="pdf/";

	$newname =$row['img_main']; 	
	$newname2 =$row['img']; 
	$newname3 =$row['file_pdf']; 

			
		$file=$path.$newname;
		if (unlink($file)){  
		echo ("deleted $file");
		}else{
		echo ("error");
		}
	$file2=$path_img.$newname2;
		if (unlink($file2)){  
		echo ("deleted $file2");
		}else{
		echo ("error");
		}
	$file3=$path_pdf.$newname3;
		if (unlink($file3)){  
		echo ("deleted $file3");
		}else{
		echo ("error");
		}

		$sql_del= "DELETE FROM product WHERE id='$id' ";
		$result_del = mysqli_query($conn, $sql_del) or die ("Error in query: $sql_del " . mysqli_error());


  
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
			text: "ลบสินค้าสำเร็จ",
			type: "success"
			}, function() {
			window.location = "index.php";
			});
		}, 100);
		</script>
		';
		}
		else{
		echo "<script type='text/javascript'>";
		echo "alert('ลบไม่สำเร็จ');";
		echo "window.location = 'index.php' ";
		echo "</script>";
		}
	}
?>