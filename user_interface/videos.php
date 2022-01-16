<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){ 
  $id=$_POST['id']; 
  
}else { 
  $id=$_GET['id']; 

}

  
?>


<div class="container">
         <div class="portfolio-menu mt-2 mb-4">
            <ul>
               <li class="btn btn-outline-dark active video" data-filter="*">Video</li>
              </ul>

<div class="row">
  
  <?php 

  $result = getVideo($conn, $id);

  if($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()){ 
      if($row['video']!='NULL'){ 

   ?>
<!-- HERE IS THE VIDEO  -->

<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
  <video class="video-fluid w-100 z-depth-1  w-100 shadow-1-strong rounded mb-4"  controls>
  <source src="../sub-admin/uploads_video/<?= $row['video'];?>" type="video/mp4" />
 </video>

</div>
<!-- End  THE VIDEO  -->
<?php } 

}
}else { 


?>

<!-- When RESULT EMPTY  -->
<div class="alert alert-warning" role="alert">
 0 result .
</div>
<?php } ?>
 </div>
 </div>
</div>








   
   