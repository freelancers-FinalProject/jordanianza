<?php
require 'template/header.php';
require 'template/navbar.php';
if(isset($_SESSION['id2'])) {

?>

<div class="container mt-4">
  <h2>Latest Video downloads</h2>
  <hr>
  <div class="row">
  
  <?php 
  $fetechDatalast =fetechDatalast($_SESSION['id2']);
   if(isset($fetechDatalast)){
     
  foreach (fetechDatalast($_SESSION['id2']) as $key => $val){
      //  print_r(fetechDatalast($_SESSION['id2']));
      
       if (!($val['video'] =="NULL")){
  ?>

 <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
  <video class="video-fluid z-depth-1  w-100 shadow-1-strong rounded mb-4"  controls>
  <source src="uploads_video/<?php echo $val['video']; ?>" type="video/mp4" />
</video>

</div>

  <?php } } }else{?>

<div class="container">
<div class="alert alert-warning" role="alert">
There is no work!  try to add something from you work
</div>
</div>
 <?php }?>
 
  </div>

</div>

<div class="container mt-4">
<h2>Latest Image downloads</h2>
  <hr>
<!-- Gallery -->
<div class="row">
  <?php
   $fetechDatalast =fetechDatalast($_SESSION['id2']);
   if(isset($fetechDatalast)){
     
  foreach (fetechDatalast($_SESSION['id2']) as $key => $val){
    
      
       if (!($val['images'] =="NULL")){
  
  ?>
  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <img
      src="uploads_image/<?php echo $val['images'];?>"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Boat on Calm Water"
    />
    </div>
  <?php } } 
  }else{?>
  <div class="container">
    <div class="alert alert-warning" role="alert">
    There is no work!  try to add something from you work.
  </div>
  </div>
  <?php }?>
</div>
<!-- Gallery -->
</div>

<?php
}else{
  header("location:../login/index.php");
  exit();
}
require 'template/footer.php';
?>