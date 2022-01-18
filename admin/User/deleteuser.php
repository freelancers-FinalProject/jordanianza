<?php 
require_once "../config.php";


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($conn, "DELETE FROM users WHERE id=$id");
	header('location: users-service.php');
    echo '<script>alert("user deleted")</script>';
    exit();
}
?>