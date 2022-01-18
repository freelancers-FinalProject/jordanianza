<?php 
require_once "../config.php";


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($conn, "DELETE FROM sub_admin WHERE id=$id");
	header('location: admins.php');
    echo '<script>alert("user deleted")</script>';
    exit();
}
?>