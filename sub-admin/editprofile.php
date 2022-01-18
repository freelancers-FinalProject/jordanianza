<?php
require_once 'template/header.php';
require 'template/navbar.php'; 
if(isset($_SESSION['id2'])) {
$pageTitle = "Edit Profile";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $ext_image = array('jpeg','jpg','png');
  $id_user   = $_POST['id']; 
  $username   = $_POST['username']; 
  $phone  = $_POST['phone'];
  $facebook  = $_POST['facebook'];
  $instagram  = $_POST['instagram'];
  $email     = $_POST['email'];
  $Old_pass  = $_POST['Old_pass'];
  $New_pass  = $_POST['New_pass'];
  $hash_pass = sha1($New_pass);
  $image_name = $_FILES['img']['name'];
  if($_POST['username'] != " "){
    $_SESSION['username_subAdmin']  = $username;
  }
  $ext = strtolower(pathinfo( $image_name, PATHINFO_EXTENSION));
  $filenamewithoutextension = pathinfo($image_name, PATHINFO_FILENAME);
  if(!empty($_FILES['img']['name'])){
      if(in_array($ext,$ext_image)){
      $filename_to_store = $filenamewithoutextension. '.' .$ext;
      move_uploaded_file($_FILES['img']['tmp_name'], getcwd(). '/images/'.$filename_to_store);
      update_image($id_user,$filename_to_store);
    }else{
      echo "<div class='alert alert-warning' role='alert'>
      Error updating record:The image extension must be('jpeg','jpg','png')
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
      </div>";
    }
  }
 if(preg_match('/^[_a-z-]+(\.[_a-z-]+)*@[a-z-]+(\.[a-z-]+)*(\.[a-z]{2,3})$/i',$email) && preg_match("/^[0-9]{2}[0-9]{4}[0-9]{4}$/", $phone) || filter_var($facebook, FILTER_VALIDATE_URL) || filter_var($instagram, FILTER_VALIDATE_URL)){
  if(!empty($New_pass)){
    if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%*&]{8,}$/', $New_pass)){
      $_SESSION['username_subAdmin']  = $username;
      update_info_profile($username,$email,$hash_pass,$id_user,$phone,$facebook,$instagram);
    }else{
        echo '<div class="alert alert-danger alert-dismissible fade show  mt-5" role="alert">
        <strong>Password:</strong> <br>
        -May contain letter and numbers<br>
        -Must contain at least 1 number and 1 letter<br>
       - May contain any of these characters: !@#$%<br>
       - Must be 8 characters
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      
    }else{
         
        update_info_profile($username,$email,$Old_pass,$id_user,$phone,$facebook,$instagram);
      }
    }else{
      echo '<div class="alert alert-danger alert-dismissible fade show  mt-5" role="alert">
        <strong>Email Address Invalid:</strong>'.$email.'
        <strong>Phone Invalid:</strong>'.$phone.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
  // header('location:editprofile.php');
}

?>

<div class="form" >
<div class="container">
    <h3 class="text-center p-3 h3"><i class="fas fa-user-edit"></i>Edit your Profile</h3>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data"> 
 <?php foreach(fetchData_subAdmin($_SESSION['id2']) as $val){
 ?>
 <div class="form-row form_img">
  <div class="form-group col-md-6">
    <?php if( $val['profile_pic'] == "" ){?>
  <img src="img/avater2.png" alt="enter image your profile" style="width: 20%;">
  <?php }else{?>
    <img src="images/<?php echo $val['profile_pic']?>" alt="enter image your profile" style=" width: 38%;
    border-radius: 50%" id="image" >
    <?php }?>
    <input type="file" id="pic_profile" name="img" style ="display:none">
  <span class="edit-span" onclick="document.getElementById('pic_profile').click();"><i class='fas fa-camera-retro'> </i></span>
  </div>
  </div>
<div class="form-row">
 <div class="form-group">
    <label for="inputname"><i class="far fa-user"></i> Username </label>
    <input type="hidden"  name="id"  value="<?php echo $val['id']?>">
    <input type="text" class="form-control" name="username"  id="inputname" placeholder="Enter your name" value="<?php echo $val['username']?>">
  </div>
  <div class="form-group">
    <label for="phone"><i class="fas fa-phone"></i> Phone </label>
    <input type="hidden"  name="id"  value="<?php echo $val['id']?>">
    <input type="text" class="form-control" name="phone"  id="inputname" placeholder="00-0000-0000" value="<?php echo $val['phone']?>">
  </div>
  <div class="form-group">
    <label for="facebook"><i class="fab fa-facebook"></i> Facebook </label>
    <input type="text" class="form-control" name="facebook"  id="facebook" placeholder="Enter your URl Facebook" value="<?php echo $val['facebook']?>">
  </div>
  <div class="form-group">
    <label for="instagram"><i class="fab fa-instagram"></i>Instagram </label>
    <input type="text" class="form-control" name="instagram"  id="instagram" placeholder="Enter your URL Instagram" value="<?php echo $val['instagram']?>">
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email"><i class="fas fa-envelope-open-text"></i> Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $val['email']?>" required>
      <div id="message2">
       <small id="letter2" class="invalid">Uppercase (A-Z) and lowercase (a-z) English letters Part contains characters [.,-].</small>
       <small id="icon" class="invalid">Characters @ lowercase (a-z) English letters. [for example gmail ]</small>
       <small id="period" class="invalid">Character . ( period, dot or fullstop) and The domain name [for example com, org, net, in, us, info] </small>
       </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4"><i class="fas fa-lock"></i> Password</label>
      <input type="hidden"  name="Old_pass"  value="<?php echo $val['password']?>">
      <input type="password" class="form-control" id="pass" name="New_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   >
      <div id="message">
       <small id="letter" class="invalid">A <b>lowercase</b>letter</small>
       <small id="capital" class="invalid">A <b>capital (uppercase)</b> letter</small>
       <small id="number" class="invalid">A <b>number</b></small>
       <small id="length" class="invalid">Minimum <b>8 characters</b></small>
       </div>
    </div>
  </div>
   <div class="d-flex justify-content-center pb-5"> 
  <button type="submit" class="btn btn-primary m-1 " name="submit">Update Profile </button>
  <button type="button" class="btn btn-secondary m-1" >Close </button>
  </div>
</form>

<?php   } ?>
</div>
</div>

<?php
 }else{
  header("location:../login/index.php");
  exit();
}
require 'template/footer.php';
?>