<?php
require 'config.php';
if($_SERVER['REQUEST_METHOD']=="POST"){  
    $image_id =$_POST['image_id'];
    $video_id =$_POST['video_id'];
    $id =$_POST['id'] ;
    $cate_name =$_POST['cate_name'];
  $ext_image = array('jpeg','jpg','png');
  $ext_video = array('gif','wmv','mp4','m4p','m4v');

foreach($_FILES['file']['name'] as $key=>$val){
   $file_name =$_FILES['file']['name'][$key];
   // get file extension
$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

// get filename without extension
$filenamewithoutextension = pathinfo($file_name, PATHINFO_FILENAME);
if (!file_exists(getcwd(). '/uploads')) {
  mkdir(getcwd(). '/uploads', 0777);
  
}elseif(in_array($ext,$ext_image)){
  $filename_to_store = $filenamewithoutextension. '.' .$ext;
  updatePost($conn , $filename_to_store , $image_id);
move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd(). '/uploads_image/'.$filename_to_store);
}elseif(in_array($ext,$ext_video)) {
  $filename_to_store = $filenamewithoutextension. '.' .$ext;
  updatePostVideo($conn , $filename_to_store , $video_id);
  move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd(). '/uploads_video/'.$filename_to_store);
 }

}

}

?>