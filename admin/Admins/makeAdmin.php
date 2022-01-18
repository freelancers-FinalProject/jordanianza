<?php 
require_once "../config.php";
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    if ($type ==0) {
        mysqli_query($conn, "UPDATE sub_admin SET type='1' WHERE id=$id");
    header('location: admins.php');
    echo '<script>alert("Admin added")</script>';
    exit();
    }

    else {
        mysqli_query($conn, "UPDATE sub_admin SET type='0' WHERE id=$id");
        header('location: admins.php');
        echo '<script>alert("Admin added")</script>';
        exit();
    }
}
?>
