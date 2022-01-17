<?php 
require_once "../config.php";


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($conn, "DELETE FROM category WHERE id=$id");
	header('location: cate.php');
    echo '<script>alert("cate deleted")</script>';
    exit();
}
?>