<?php 
	$conn = mysqli_connect('localhost','root','','tintuc');
	if(!$conn){
		echo "Khong ket noi duoc voi database";
	}else{
		$a = "SELECT * FROM baiviet";
		$b = mysqli_query($conn,$a);
	}
	if(isset($_POST['xoa'])){
		$c = "DELETE FROM baiviet WHERE id='".$_POST['id']."'";
		$d= mysqli_query($conn,$c);
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>admin</title>
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
					<li><a href="them.php">THÊM BÀI</a></li>
				</ul>
			</div>
		</div>
		<div class="main">
				<table class="noidung" border="1" cellpadding="10" cellspacing="0">
					<tr>
						<th>ID</th>
						<th>TIÊU ĐỀ</th>
						<th>HÌNH ẢNH</th>
						<th>NỘI DUNG</th>
						<th>SỬA</th>
						<th>XÓA</th>
					</tr>
					<?php while($row = mysqli_fetch_array($b)){ ?>
					<tr>
						<td><input type="text" name="id" value="<?php echo $row['id']; ?>"></td>
						<td><textarea name="tieude"><?php echo $row['tieude']; ?></textarea></td>
						<td><input type="text" name="anh" value="<?php echo $row['anh']; ?>"></td>
						<td><textarea name="noidung"><?php echo $row['noidung']; ?></textarea></td>
						<form action = "sua.php" method="Post">							
							<td>
								<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
								<input type="submit" name="sua" value="SỬA">
							</td>
						</form>
						<form  method="Post">							
							<td>
								<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
								<input type="submit" name="xoa" value="XÓA">
							</td>
						</form>						
					</tr>
					<?php } ?>
				</table>
		</div>
		<div class="clearfix"></div>		
	</div>
</body>
</html>