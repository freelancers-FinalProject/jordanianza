<?php
// this page delete tages from sub-admin
require 'config.php';
$id =isset($_GET['id']) && is_numeric($_GET['id'])? intval( $_GET['id']):0;
deleteData($id);
header("location:category.php");
?>