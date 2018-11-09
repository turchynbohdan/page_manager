<?php
session_start();
session_destroy();
unset($_SESSION['userID']);
header('location:/test-task2/index.php');
exit();
?>
