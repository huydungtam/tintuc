<?php 
	$conn = mysqli_connect('localhost','root','','tintuc');
	if(!$conn){
		echo("Không thể kết nối được với database");
	}else{
		if(isset($_POST['tieude']) && isset($_POST['anh']) && isset($_POST['noidung'])){
			$tieude = $_POST['tieude'];
			$anh = $_POST['anh'];
			$noidung = $_POST['noidung'];
		}else{
			$tieude = "";
			$anh = "";
			$noidung = "";
		}
		if(isset($_POST['them'])){
				if($tieude=="" || $anh=="" || $noidung==""){
					echo "Vui lòng nhập đầy đủ thông tin";
				}else{
					$a = "INSERT INTO baiviet(tieude,anh,noidung) VALUE ('$tieude','$anh','$noidung')";
					if(	mysqli_query($conn,$a)){
						header("Location:admin.php");
					}else{
						echo "Có lỗi xảy ra";
					}
				}					
			}
		if(isset($_POST['huy'])){
			header("Location:admin.php");
		}
	}
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm bài</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="wrapper">
		<h1 class="tieude">ADMIN</h1>
		<div class="menucon">
			<div class="container">
				<ul>
					<li><a href="admin.php">DANH SÁCH</a></li>
					<li><a href="">THÀNH VIÊN</a></li>
					<li><a href="">THÊM BÀI</a></li>
				</ul>
			</div>
		</div>
		<div class="main">
			<form method="Post">
				<table class="noidung" border="1" cellpadding="10" cellspacing="0">
					<tr>
						<th>TIÊU ĐỀ</th>
						<th>HÌNH ẢNH</th>
						<th>NỘI DUNG</th>
					</tr>
					<tr>
						<td><textarea name="tieude"></textarea></td>
						<td><input type="text" name="anh"></input></td>
						<td><textarea name="noidung"></textarea></td>
					</tr>
					
				</table>
				<button name="them">THÊM</button>
				<button name="huy">HỦY</button>
			</form>
		</div>
		<div class="clearfix"></div>		
	</div>
</body>
</html>