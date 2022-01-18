<?php 
require "template/header.php";
$navbarTrans = false;
require "template/navbar.php";?>

<div class="container">
    
	<div class="row">
<?php
$name_category =isset($_GET['name_category']) && is_string($_GET['name_category'])? strval( $_GET['name_category']):0;
 $array =getSubAdmin($conn,$name_category);
 if(isset($array)){
  foreach(getSubAdmin($conn,$name_category) as $val){
?>
		<div class="col-md-4">
            <a href='subAdmin_profile.php?id=<?=$val['id']; ?>'>
    <div class="profile-card-2" >
       <?php if(isset($val['profile_pic'])){
             echo' <img src="../sub-admin/images/'.$val['profile_pic'].'" class="img img-responsive w-100 " >';
       }else if($name_category == "makeup artists"){ 
      
        echo'<img src="img/fashion.jpg" class="img img-responsive w-100 ">';

       }else if($name_category == "photographers"){
        echo'<img src="img/camera3.jpg" class="img img-responsive w-100 ">';
       }else if($name_category == "designers"){
        echo'<img src="img/design.jpg" class="img img-responsive w-100 ">';
       }
       ?> 
       
       <!-- <img src="img/camera2.jpg" class="img img-responsive w-100 "> -->
        <div class="profile-name"><?php echo $val['username']; ?></div>
        <div class="profile-username"><?php echo $val['email']; ?></div>
        <div class="profile-email"><?php echo $val['name']; ?></div>
        <div class="profile-icons"><a href="http://www.facebook.com/<?= $val['facebook']; ?>"><i class="fa fa-facebook"></i></a><a href="http://www.instagram.com/<?= $val['instagram']; ?>"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
        
    </div>
    </a>
</div>

<?php } }else{
     echo' <div class="alert alert-warning  " role="alert">
      0 result .
     </div>';
      }
      ?>
</div>
</div>
<?php require 'template/footer.php'?>