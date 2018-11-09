<?php
include 'conn.php';
include 'session.php';

$infoID = $_GET['infoID'];
$title = $_POST['title'];
$content = $_POST['content'];
$meta = $_POST['meta'];

$sql = "SELECT * FROM info_tbl WHERE infoID = ".$infoID;
$result = $conn->query($sql);
$row = $result->fetch_array();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $row['meta']; ?>">
    <title><?php echo $row['title']; ?></title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
      <div class="container">
    <ul id="menu">
      <li><a href="pageManager.php">Ppage manager</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
    <h1>
      Title:
    </br>
      <?php echo $row['title']; ?>
    </h1>
    <h2>
      Content:
      </br>
      <?php echo $row['content']; ?></h2>
    <h3>
      <?php echo $row['meta'];
      $sql->close();
      ?></h3>

</div>

  </body>
</html>
