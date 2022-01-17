<?php 
require 'config.php';
if($_SERVER['REQUEST_METHOD']=="POST"){ 
    $image_id = $_POST['image_id'] ;
    $video_id = $_POST['video_id'] ;
    $id = $_POST['id']; 
    $category_name =$_POST['category_name']; 
    DeletePostImage($conn,$image_id) ;
    DeletePostVideo($conn,$video_id);
    header("location:posts.php?id=$id&category_name=$category_name");

}

?>