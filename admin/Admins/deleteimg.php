<?php 
require_once "../config.php";


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$subAdmin_id = $_GET['subAdmin_id'];
	mysqli_query($conn, "DELETE FROM content WHERE id=$id");
	header('location: read.php?id='.$subAdmin_id.'');
    echo '<script>alert("user deleted")</script>';
    exit();
}
?>