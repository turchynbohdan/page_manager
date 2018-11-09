<?php
include 'conn.php';
include 'session.php';

$id = $_GET['infoID'];
$view = "SELECT * from info_tbl where md5(infoID) = '$id'";
$result = $conn->query($view);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

	$ID = $_GET['infoID'];

	$title = $_POST['title'];
	$content = $_POST['content'];
	$meta = $_POST['meta'];

	$insert = "UPDATE info_tbl set title = '$title', content = '$content', meta = '$meta' where md5(infoID) = '$ID'";

	if($conn->query($insert)== TRUE){

			echo "Sucessfully update data";
			header('location:pageManager.php');
	}else{

		echo "Ooppss cannot add data" . $conn->error;
		header('location:pageManager.php');
	}
	$conn->close();
}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>
			Edit
		</title>
		</head>
	<body>
		<div class="container">

			<ul id="menu">
				<li><a href="pageManager.php">Page manager</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
				<form action="" method="POST">
				<table>
					<tr>
						<td>Title:
							<input type="text" id="title" name="title" value="<?php echo $row['title'];?>" placeholder="Type title here" required></td>
						</tr>
						<tr>
							<td>Content:
							<input type="text" name="content"  value="<?php echo $row['content'];?>" placeholder="Type content here.." required></td>
						</tr>
						<tr>
							<td>Meta:
								<input type="text" name="meta" value="<?php echo $row['meta'];?>" placeholder="Type meta here" required></td>
							</tr>
						<tr>
							<td><input type="submit" name="update" value="Update"></td>
						</tr>
				</table>
			</form>
				<br>

			</div>
		</div>
		</body>

</html>
