<?php
include 'conn.php';
include 'session.php';



if(isset($_POST['add'])){

	$title = $_POST['title'];
	$content = $_POST['content'];
	$meta = $_POST['meta'];
	$infoID = $_GET['infoID'];

	$insert = "insert into info_tbl (title,content,meta) values ('$title','$content','$meta')";

	if($conn->query($insert)== TRUE){

			echo "Sucessfully add data";
			header('location:pageManager.php');
	}else{

		echo "Cannot add data" . $conn->connect_error;
		header('location:pageManager.php');
	}
	$insert->close();
}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">

		<title>Page manager</title>

		</head>
	<body>
		<div class="container">
			<ul id="menu">
				<li><a href="pageManager.php">Page manager</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
				<form action="pageManager.php" method="POST">
				<table>
					<tr>
						<td>Title: <input type="text" name="title" value="" placeholder="Type Title here" required></td>
						</tr>
						<tr>
							<td>Content: <input type="text" name="content" placeholder="Type Content here.." required></td>
						</tr>
						<tr>
							<td>Meta description: <input type="text" name="meta" placeholder="Type Meta  here.." required></td>
						</tr>
						<tr>
							<td><input type="submit" name="add" value="Add"></td>
						</tr>
				</table>
			</form>
				<br>
				<table>
					<tr>
					<th>title</th>
					<th>Action</th>
					</tr>

					<?php
					$sql = "SELECT * FROM info_tbl";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
					while($row = $result->fetch_array()){
						?>

						<tr>
							<td><a href="page.php?infoID=<?php echo $row['infoID']; ?>"><?php echo $row['title'];?></a></td>
							<td><a href="edit.php?infoID=<?php echo md5($row['infoID']);?>">Edit
							</a>/<a href="delete.php?infoID=<?php echo md5($row['infoID']);?>">Delete</a></td>
						</tr>

						<?php
							}
						}else{
							echo "<center><p> No Records</p></center>";
						}
				$conn->close();
				?>
				</table>
		</div>

		</body>
</html>
