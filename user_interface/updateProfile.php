<?php
require 'config.php';
require 'includes/function/function.php';
// print_r($_FILES);
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_user   = $_POST['id']; 
    $username  = $_POST['username'];
    $email     = $_POST['email'];
    $Old_pass  = $_POST['Old_pass'];
    $New_pass  = $_POST['New_pass'];
    $hash_pass = sha1($New_pass);
    $image_name = $_FILES['img']['name'];
    $ext = strtolower(pathinfo($ $image_name, PATHINFO_EXTENSION));
    $filenamewithoutextension = pathinfo($image_name, PATHINFO_FILENAME);
   
    //  if(empty($_FILES))`
    if(isset($New_pass) || !in_array($ext,$ext_image) || !empty($_FILES)){
        $filename_to_store = $filenamewithoutextension. '.' .$ext;
        
        move_uploaded_file($_FILES['file']['tmp_name'], getcwd(). '/images/'.$filename_to_store);
        update_info_profile($username,$email,$hash_pass,$id_user,$filename_to_store);
    }else{
        update_info_profile($username,$email,$Old_pass,$id_user);
    }
    }
?>