<?php 
require "template/header.php";
$navbarTrans = false;
require "template/navbar.php";

//  require "config.php";
if($_SERVER['REQUEST_METHOD']=="POST"){ 
  $id=$_POST['id']; 
  
}else { 
  $id=$_GET['id']; 
}

$subAdmin = getSubAdminInfo($conn, $id); 



?>
<!--  -->
    <!-- profile start -->



<div class="box ">
  <div id="overlay">
    <div  style='
     background:
      url("images/<?= $subAdmin['profile_pic'];?>")
     center center no-repeat;
     background-size: cover;'
     class="image">
      <div class="trick">

      </div>
    </div>
    <ul class="text "> <?= $subAdmin['username']; ?></ul>
    <div class="text1 "> <?= $subAdmin['name']; ?> </div>
</div>



<div class="panel-group mb-5" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default ">
  <div class="panel-heading " role="tab" id="headingOne">
    <h4 class="panel-title ">
      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="" aria-controls="collapseOne">
        <div class="title  btn btn-danger btn-outline btn-lg">ABOUT</div>
      </a>
    </h4>
  </div>
  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
    <div class="panel-body">
     <!-- About info -->
     <?php if($subAdmin['address']!==""){ ?>

      <div>
      <i class="fas fa-map-marker-alt"></i> <?=$subAdmin['address'];?>
      </div> 
    <?php } ?>

    <?php if($subAdmin['phone']!==""){ ?>
      <div class="btn  btn-sm text-center">
      <i class="fas fa-phone-square-alt"></i> <a href="" ><?= $subAdmin['phone'];?></a>
      </div>
      <?php }?>
      <!-- About info END-->
    
  </div>
  </div>
</div>
<div class="panel panel-default ">
  <div class="panel-heading" role="tab" id="headingTwo">
    <h4 class="panel-title">
      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <div class="title btn btn-danger btn-outline btn-lg">SOCIAL</div>
      </a>
    </h4>
  </div>
  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
    <div class="panel-body">

   <!-- Social info START -->
   
  
                          <!-- EMAIL  -->
                          
                          <?php if($subAdmin['email']!==""){ ?>
                           
                      <a class="btn btn-danger btn-sm"  target="_blank" rel="publisher"
                       href="https://mail.google.com/<?= $subAdmin['email']; ?>">
                        <i class="fa fa-google"></i>

                         <small><?= $subAdmin['email']; ?></small>
                    </a>
                    
                    <?php } ?>
                    

                           <!-- FACEBOOK  -->
                           <?php if($subAdmin['facebook']!==""){ ?>
                            

                        
                    <a class="btn btn-primary btn-sm" rel="publisher" target="_blank"
                       href="http://www.facebook.com/<?= $subAdmin['facebook']; ?>">
                        <i class="fa fa-facebook"></i>
                        <small><?= $subAdmin['facebook']; ?> </small>
                    </a>
                    
                    <?php } ?>

                           <!-- INSTAGRAM  -->
                           <?php if($subAdmin['instagram']!==""){ ?>
                            
                     <a class="btn btn-warning btn-sm" rel="publisher" target="_blank"
                       href="http://www.instagram.com/<?= $subAdmin['instagram']; ?>">
                        <i class="fa fa-instagram"></i>
                        <small><?= $subAdmin['instagram']; ?></small>
                    </a>
               
                    <?php } ?>
   
      
      
      <!-- Social info END-->


  </div>
  </div>
</div>
<!-- <div class="panel panel-default ">
  <div class="panel-heading" role="tab" id="headingThree">
    <h4 class="panel-title">
      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <div class="title btn btn-danger btn-outline btn-lg">CONTACT</div>
      </a>
    </h4>
  </div>
  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
    <div class="panel-body">

      
      
                <form id="form" class="topBefore">

          <input id="name" type="text" placeholder="NAME">
          <input id="email" type="text" placeholder="E-MAIL">
          <textarea id="message" type="text" placeholder="MESSAGE"></textarea>
          <input id="submit" type="submit" value="Submit Now!">

        </form>


      
      
      
      
    </div>
  </div>
</div> -->
</div>





    <!-- profile End -->
    <?php 
    
    require "gallary2.php";  
    require "videos.php";
    ?>

<?php
require "template/footer.php";

?>
