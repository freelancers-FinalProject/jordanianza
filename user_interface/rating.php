<?php
require 'config.php';
$id_img = $_POST['image_id'];
$rating = $_POST['rating'];
update_rating($id_img,$rating);


?>