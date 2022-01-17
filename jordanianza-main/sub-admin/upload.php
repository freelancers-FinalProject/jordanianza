<?php
require 'config.php';
$ext_image = array('jpeg','jpg','png');
 $ext_video = array('gif','wmv','mp4','m4p','m4v');
 $sub_category = $_POST['sub_category'];
 
foreach($_FILES['file']['name'] as $key=>$val){

    $file_name = $_FILES['file']['name'][$key];
    
    // get file extension
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
     
    // get filename without extension
    $filenamewithoutextension = pathinfo($file_name, PATHINFO_FILENAME);
    if (!file_exists(getcwd(). '/uploads_image') && !file_exists(getcwd(). '/uploads_video')) {
        mkdir(getcwd(). '/uploads_image', 0777);
        mkdir(getcwd(). '/uploads_video', 0777);
    }
 elseif(in_array($ext,$ext_image)){
      $filename_to_store = $filenamewithoutextension. '.' .$ext;
    insertImageandVideo($filename_to_store,$video='NULL',$sub_category);
    move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd(). '/uploads_image/'.$filename_to_store);
    }elseif(in_array($ext,$ext_video)) {
      $filename_to_store = $filenamewithoutextension. '.' .$ext;
      insertImageandVideo($image='NULL',$filename_to_store,$sub_category);
      move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd(). '/uploads_video/'.$filename_to_store);
    }
    
  }

?>