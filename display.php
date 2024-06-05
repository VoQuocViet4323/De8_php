<?php
	require_once './db.php';
	if($conn->connect_error){
		echo "ket noi that bai: " . $conn->connect_error;
	}

	$sql = "SELECT * FROM xemay WHERE gia > 90000000";

	$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Danh sách xe máy</title>
</head>
<body>
	<style type="text/css">
		table{
			border-collapse: collapse;	 
		}
	</style>
	<div class="container">
		<h2>Danh sách xe máy</h2>
		<?php
			if($result->num_rows > 0){
				echo "<table border = 1";
				echo "<tr>
					  <th>Mã xe</th>
					  <th>Tên xe</th>
					  <th>Nhà sản xuất</th>
					  <th>Giá</th>
					  </tr>
				";
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["maxe"] . "</td>";
					echo "<td>" . $row["tenxe"] . "</td>";
					echo "<td>" . $row["nhasx"] . "</td>";
					echo "<td>" . $row["gia"] . "</td>";
					echo "</tr>";
				}	
				echo "</table>";
			}else
			echo "er: ";
		?>
	</div>
</body>
</html>