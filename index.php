<?php
	include 'conn.php';
	session_start();

	if(isset($_SESSION['userID'])){

		header('location:pageManager.php');
	}

	if(isset($_POST['log'])){

		$user = $_POST['username'];
		$pass =  $_POST['pass'];

		$sql = "SELECT * FROM user_tbl where username = '$user' and password = '$pass'";
		$result = $conn->query($sql);

		if($result-> num_rows > 0){
			while($row= $result->fetch_assoc()){
				$_SESSION['userID'] = $row['userID'];
				$_SESSION['username'] = $row['username'];


			}
			?>
			<script> alert('Welcome <?php echo $_SESSION['username']?>'); </script>
			<script>window.location='pageManager.php';</script>
			<?php


			}else{
				echo "<center><p style=color:red;>Invalid username or password</p></center>";

		}
		$conn->close();
	}
?>
<!DOCTYPE html>
<form action="index.php" method="POST">
<html>
<head>
		<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<div class="container">
	<h3>Login Here :</h3></ceter>
	<table>
		<tr>
			<td>
				Username:
			</td>
			<td>
			<input type="text" name="username" required>
			</td>
		</tr>

		<tr>
			<td>
				Password:
			</td>
				<td>
				<input type="password" name="pass" required>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="login" name="log">
			</td>
		</tr>
	</table>
</div>


</html>
</form>
