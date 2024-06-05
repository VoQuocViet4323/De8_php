<?php	
	require_once './db.php';
	if($conn->connect_error){
		echo "ket noi that bai: " . $conn->connect_error;
	}
	if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['nhasx']) && isset($_POST['gia'])){
		//Lấy dữ liệu từ form
		$id = $_POST['id'];
		$name = $_POST['name'];
		$nhasx = $_POST['nhasx'];
		$gia = $_POST['gia'];

		//Kiểm tra mã xe đã tồn tại chưa
		$checkSQL = "SELECT * FROM xemay WHERE maxe = '$id'";
		$result = $conn->query($checkSQL);
		if($result->num_rows > 0){
			echo "Mã xe: " . 'id' . "đã tồn tại"; 
		}else {
			//SQL query để thêm bản ghi vào csdl
			$sql = "INSERT INTO xemay VALUES ('$id', '$name', '$nhasx', '$gia')";
			if($conn->query($sql) === TRUE){
				echo "Them xe thanh cong";
			}else{
				echo "Them that bai!";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Them xe</title>
</head>
<body>
	<h2>Them xe</h2>
	<form action="" method="post">
		<label for="id">Mã xe: </label><br>
		<input type="text" name="id" class="id"><br>

		<label for="name">Tên xe: </label><br>
		<input type="text" name="name" class="name"><br>

		<label for="nhasx">Nhà sản xuất: </label><br>
		<input type="text" name="nhasx" class="nhasx"><br>

		<label for="gia">Giá: </label><br>
		<input type="text" name="gia" class="gia"><br>

		<button type="submit">Thêm xe</button>
		<button type="reset">Nhập lại</button>
		<a href="./display.php"> Xem danh sách xe máy có giá trên 90tr</a>
	</form>
</body>
</html>